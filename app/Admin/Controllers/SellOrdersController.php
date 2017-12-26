<?php

namespace App\Admin\Controllers;

use App\Model\SellOrder;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class SellOrdersController extends Controller
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

            $content->header('被卖人信息');
            $content->description('展示被卖人信息');

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

            $content->header('编辑被卖人');
            $content->description('手动编辑被卖人信息');

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

            $content->header('创建被卖人');
            $content->description('手动添创建被卖人');

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
        return Admin::grid(SellOrder::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->sell_photo('头像')->display(function ($sell_photo) {
                return "<image style='height:30px;width:30px;'' src='$sell_photo'/>";
            });
            $grid->sell_name('姓名')->editable();
            $grid->sell_sex('性别')->editable('select', [1 => '男', 2 => '女', 3 => '外星人']);
            $grid->sell_age('年龄')->sortable()->editable();
            $grid->sell_height('身高')->sortable()->editable();
            $grid->sell_weight('体重')->sortable()->editable();
            $grid->sell_city('城市')->editable();
            $grid->sell_tel('电话')->editable();
            $grid->sell_wechat_number('微信号')->editable();
            $grid->sell_description('描述')->editable('textarea');
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
        return Admin::form(SellOrder::class, function (Form $form) {

            $sex = [
                1  => '男',
                2 => '女',
                3  => '外星人',
            ];
            $width = 50;
            $height = 50;

            $form->display('id', 'ID');
            $form->image('avatar', trans('admin.avatar'))->crop($width,$height);
            $form->text('sell_name','姓名');
            $form->select('sell_sex','性别')->options($sex);
            $form->number('sell_age','年龄');
            $form->number('sell_height','身高');
            $form->number('sell_weight','体重');
            $form->text('sell_city','城市');
            $form->text('sell_tel','电话');
            $form->text('sell_wechat_number','微信号');
            $form->textarea('sell_description','描述');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
