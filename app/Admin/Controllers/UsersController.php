<?php

namespace App\Admin\Controllers;

use App\Models\WeChatUser;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UsersController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('用户信息');
            $content->description('展示用户信息');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('编辑用户');
            $content->description('手动编辑用户信息');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('添加用户');
            $content->description('手动添加用户');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(WeChatUser::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('user_icon','头像')->display(function ($sell_photo) {
                return "<image style='height:30px;width:30px;'' src='/uploads/$sell_photo'/>";
            });
            $grid->column('user_name','姓名')->editable();
            $grid->column('user_sex','性别')->editable('select', [1 => '男', 2 => '女'])->sortable();
            $grid->column('user_age','年龄')->editable()->sortable();
            $grid->column('user_tel','电话')->editable();
            $grid->column('user_province','省份')->sortable()->editable();
            $grid->column('user_city','城市')->sortable()->editable();
            $grid->column('user_area','地区')->sortable()->editable();
            $grid->column('user_openid','微信openId');
            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(WeChatUser::class, function (Form $form) {

            $sex = [
                1  => '男',
                2 => '女',
            ];
            $width = 500;
            $height = 500;

            $form->display('id', 'ID');
            $form->image('user_icon','头像')->resize($width,$height);
            $form->text('user_name','姓名')->rules('required', [
                'required' => '姓名不能为空'
            ]);
            $form->radio('user_sex','性别')->options($sex);
            $form->number('user_age','年龄');
            $form->mobile('user_tel','电话')->options(['mask' => '999 9999 9999'])->rules('required');
            $form->text('user_province','省份');
            $form->text('user_city','城市');
            $form->text('user_area','地区');
            $form->display('user_openid','微信号');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
