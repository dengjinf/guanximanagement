<?php

namespace App\Admin\Controllers;

use App\Models\Events;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EventsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Events';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Events());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('content', __('Content'));
        $grid->column('image', __('Image'))->image();
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
        $show = new Show(Events::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('title_fr', __('Title Fr'));
        $show->field('description', __('Description'));
        $show->field('description_fr', __('Description Fr'));
        $show->field('content', __('Content'));
        $show->field('content_fr', __('Content Fr'));
        $show->field('image', __('Image'))->image();
        $show->field('image_fr', __('Image Fr'))->image();
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
        $form = new Form(new Events());

        $form->text('title', __('Title'));
        $form->text('title_fr', __('Title Fr'));
        $form->textarea('description', __('Description'));
        $form->textarea('description_fr', __('Description Fr'));
        $form->textarea('content', __('Content'));
        $form->textarea('content_fr', __('Content Fr'));
        $form->file('image', __('Image'));
        $form->file('image_fr', __('Image Fr'));

        return $form;
    }
}
