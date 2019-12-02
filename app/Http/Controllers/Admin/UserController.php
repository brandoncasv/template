<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Sdkconsultoria\Base\Controllers\ResourceController;

class UserController extends ResourceController
{
    protected $model    = '\App\User';
    protected $view     = 'admin.user';
    protected $resource = 'user';
    protected $key      = 'name';

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

    public function myProfile()
    {
        $model = auth()->user();
        return view('user.my-profile', ['model' => $model]);
    }
}
