<?php

namespace App\Admin\Controllers;

use App\Models\About;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AboutContentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'About';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new About());

        $grid->column('id', __('Id'));
        $grid->column('part', __('Part'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'))->width(1000);
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
        $show = new Show(About::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('part', __('Part'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('description_fr', __('Description Fr'));
        $show->field('image', __('Image'))->image();
        $show->field('image_fr', __('Image Fr'))->image();
        $show->field('page_content', __('PageContent'))->unescape()->as(function($body){
            return "<pre>{$body}</pre>";
        });
        $show->field('page_content_fr', __('PageContent Fr'))->unescape()->as(function($body){
            return "<pre>{$body}</pre>";
        });
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
        $form = new Form(new About());

        $form->text('part', __('Part'));
        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->textarea('description_fr', __('Description Fr'));
        $form->file('image', __('Image'));
        $form->file('image_fr', __('Image Fr'));
        $form->UEditor('page_content', __('PageContent'));
        $form->UEditor('page_content_fr', __('PageContent Fr'));

        return $form;
    }
}
