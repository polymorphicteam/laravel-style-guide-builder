<?php

namespace Cswiley\StyleGuide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use function redirect;

class StyleGuideController extends Controller
{
    private $sectionPath = 'styleguide::components';
    private $menu;

    public function __construct()
    {
        $this->menu = config('styleguide.menu', []);
    }

    public function index()
    {
        $sections = $this->getSections();

        return view('styleguide::section', [
            'sections' => $sections,
            'menu' => $this->menu
        ]);
    }

    public function show($section)
    {
//        Breadcrumbs::register('breadcrumb', function ($breadcrumbs) use ($section) {
//            $breadcrumbs->push('Styleguide', url(config("styleguide.prefix")));
//            $breadcrumbs->push($section, url(config("styleguide.prefix") . "/$section"));
//        });

        $section = $this->getSection($section);
        if (empty($section)) {
            return redirect()->action('StyleGuideController@index');
        }

        return view('styleguide::section', [
            'sections' => [$section],
            'menu' => $this->menu
        ]);
    }

    private function getSections()
    {
        if (empty($this->menu)) {
            return [];
        }
        return $sections = array_map(function ($name) {
            return $this->getSection($name);
        }, $this->menu);
    }

    private function getSection($section)
    {
        $override = config('styleguide.view_path');
        if (View::exists("{$override}/$section")) {
            return view("{$override}/$section")->render();
        }

        if (View::exists("{$this->sectionPath}/$section")) {
            return view("{$this->sectionPath}/$section")->render();
        }

        return '';
    }

}
