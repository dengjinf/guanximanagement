<?php

namespace App\Admin\Controllers;

use App\Models\Service;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServiceContentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Service';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Service());

        $grid->column('part', __('Part'));
        $grid->column('name', __('Name'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('image', __('Image'))->image();
        $grid->column('hoverText', __('HoverText'));
        $grid->column('created_at', __('Created at'));

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
        $show = new Show(Service::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('part', __('Part'));
        $show->field('name', __('Name'));
        $show->field('title', __('Title'));
        $show->field('title_fr', __('Title Fr'));
        $show->field('description', __('Description'));
        $show->field('description_fr', __('Description Fr'));
        $show->field('image', __('Image'))->image();
        $show->field('image_fr', __('Image Fr'))->image();
        $show->field('hoverText', __('HoverText'));
        $show->field('hoverText_fr', __('HoverText Fr'));
        $show->field('page_content', __('PageContent'))->unescape()->as(function($body){
            return "<pre>{$body}</pre>>";
        });
        $show->field('page_content_fr', __('PageContent Fr'))->unescape()->as(function($body){
            return "<pre>{$body}</pre>>";
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
        $form = new Form(new Service());

        $form->text('part', __('Part'));
        $form->text('name', __('Name'));
        $form->text('title', __('Title'));
        $form->text('title_fr', __('Title Fr'));
        $form->textarea('description', __('Description'));
        $form->textarea('description_fr', __('Description Fr'));
        $form->file('image', __('Image'));
        $form->file('image_fr', __('Image Fr'));
        $form->text('hoverText', __('HoverText'));
        $form->text('hoverText_fr', __('HoverText Fr'));
        $form->UEditor('page_content', __('PageContent'));
        $form->UEditor('page_content_fr', __('PageContent Fr'));

        return $form;
    }
}
