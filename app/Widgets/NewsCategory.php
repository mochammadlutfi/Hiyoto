<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\PostCategory;
class NewsCategory extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $data = PostCategory::latest()->get();
        // dd($data);
        return view('widgets.news_category', [
            'config' => $this->config,
            'data' => $data,
        ]);
    }
}
