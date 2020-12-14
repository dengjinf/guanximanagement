<?php

namespace App\Admin\Controllers;

use App\Models\Home;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HomeContentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Home';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Home());

        $grid->column('id', __('Id'));
        $grid->column('part', __('Part'));
        $grid->column('name', __('Name'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('content', __('Content'))->width(600)->suffix();
        $grid->column('image', __('Image'))->image();
        $grid->column('hoverText', __('HoverText'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Home::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('part', __('Part'));
        $show->field('name', __('Name'));
        $show->field('title', __('Title'));
        $show->field('title_fr', __('Title Fr'));
        $show->field('description', __('Description'));
        $show->field('description_fr', __('Description Fr'));
        $show->field('content', __('Content'))->unescape()->as(function ($body) {
            return "<pre>{$body}</pre>";
        });
        $show->field('content_fr', __('Content Fr'))->unescape()->as(function ($body) {
            return "<pre>{$body}</pre>";
        });
        $show->field('image', __('Image'))->image();
        $show->field('image_fr', __('Image Fr'))->image();
        $show->field('hoverText', __('HoverText'));
        $show->field('hoverText_fr', __('HoverText Fr'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Home());

        $form->text('part', __('Part'));
        $form->text('name', __('Name'));
        $form->text('title', __('Title'));
        $form->text('title_fr', __('Title Fr'));
        $form->textarea('description', __('Description'));
        $form->textarea('description_fr', __('Description Fr'));
        $form->UEditor('content', __('Content'));
        $form->UEditor('content_fr', __('Content Fr'));
        $form->file('image', __('Image'));
        $form->file('image_fr', __('Image Fr'));
        $form->text('hoverText', __('HoverText'));
        $form->text('hoverText_fr', __('HoverText Fr'));

        return $form;
    }
}
