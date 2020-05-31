<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Sdkconsultoria\Base\Controllers\ResourceController;

class UserController extends ResourceController
{
    protected $model    = '\App\User';
    protected $view     = 'admin.user';
    protected $resource = 'user';
    protected $key      = 'seoname';

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request);
        $model = $this->createOrFind();
        $model->status = $this->model::STATUS_ACTIVE;
        $this->loadData($model, $request);
        $model->created_by = \Auth::user()->id;
        $model->save();

        $model->assignRole([$request->input('role')]);
        return redirect()->route($this->resource . '.index')->with('success', __('base::messages.saved'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = $this->findModel($id);
        $this->validate($request, 'rulesUpdate', ['user_id' => $model->id]);
        $this->loadData($model, $request);
        $model->save();
        return redirect()->route($this->resource . '.index')->with('success', __('base::messages.saved'));
    }

    public function myProfile(Request $request)
    {
        $model = auth()->user();

        if ($request->isMethod('post')) {
            $this->validate($request, 'rulesProfile', ['user_id' => $model->id]);
            $this->loadData($model, $request);
            $model->save();

            $this->saveImage($model, $request);
            return redirect()->route('my-profile')->with('success', __('base::messages.saved'));
        }

        return view('admin.user.my-profile', ['model' => $model]);
    }

    private function saveImage($model, $request)
    {
        if($request->hasfile('my_profile_photo'))
        {
            $file = $request->file('my_profile_photo');
            $extension = $file->getClientOriginalExtension();
            $filename  = $file->getClientOriginalName();
            $file->storeAs('users/' . $model->id, $model->id . '_profile.' . $file->extension(), 'public');
            $model->avatar = $file->extension();
            $model->save();
            $model->convertImage();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = new $this->model();

        if (!$request->input('status')) {
            $models = $this->model::where($model->getTable().'.status', '!=', $this->model::STATUS_DELETE)
            ->where($model->getTable().'.status', '!=',$this->model::STATUS_CREATE);
        }else{
            $models = $this->model::where($model->getTable().'.id', '>', '0');
        }

        $models = $models->where($model->getTable().'.status', '!=' ,'0')->with('roles');

        $models   = Self::getOrder($models, $request->get('order'));
        if ($request->input('pagination')) {
            $this->filters['pagination'] = $request->input('pagination');
        }
        $models   = Self::setFilter($models, $request);
        $models   = $models->paginate($this->filters['pagination'])->appends($this->filters);

        return view($this->view . '.index', compact('models', 'model'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clients(Request $request)
    {
        $model = new $this->model();

        if (!$request->input('status')) {
            $models = $this->model::where($model->getTable().'.status', '!=', $this->model::STATUS_DELETE)
            ->where($model->getTable().'.status', '!=',$this->model::STATUS_CREATE);
        }else{
            $models = $this->model::where($model->getTable().'.id', '>', '0');
        }

        $models = $models->where($model->getTable().'.status', '!=' ,'0')->with('roles');

        $models   = Self::getOrder($models, $request->get('order'));
        if ($request->input('pagination')) {
            $this->filters['pagination'] = $request->input('pagination');
        }
        $models   = Self::setFilter($models, $request);
        $models   = $models->paginate($this->filters['pagination'])->appends($this->filters);

        return view($this->view . '.index', compact('models', 'model'));
    }
}
