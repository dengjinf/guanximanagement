<?php

namespace App\Admin\Controllers;

use App\Models\ProjectCase;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CaseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ProjectCase';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ProjectCase());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->image();
        $grid->column('content', __('Content'));
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
        $show = new Show(ProjectCase::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'))->image();
        $show->field('image_fr', __('Image Fr'))->image();
        $show->field('content', __('Content'));
        $show->field('content_fr', __('Content Fr'));
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
        $form = new Form(new ProjectCase());

        $form->file('image', __('Image'));
        $form->file('image_fr', __('Image Fr'));
        $form->textarea('content', __('Content'));
        $form->textarea('content_fr', __('Content Fr'));

        return $form;
    }
}
