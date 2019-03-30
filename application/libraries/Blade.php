<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blade
{
    public function __construct()
    {

        $obj =& get_instance();

        $path_route = $obj->router->fetch_module();

        if ($path_route != "") {
            $path_route = "modules/$path_route/";
        }

        $path = [
            APPPATH . $path_route . 'views/',
        ];

        $cachePath = APPPATH . 'cache/views'; // 编译文件缓存目录

        $compiler = new \Xiaoler\Blade\Compilers\BladeCompiler($cachePath);
        $engine = new \Xiaoler\Blade\Engines\CompilerEngine($compiler);
        $finder = new \Xiaoler\Blade\FileViewFinder($path);

        // 如果需要添加自定义的文件扩展，使用以下方法
        $finder->addExtension('php');

        // 实例化 Factory
        $this->factory = new \Xiaoler\Blade\Factory($engine, $finder);
    }
    public function view($path, $vars = [])
    {
        echo $this->factory->make($path, $vars);
    }
    public function exists($path)
    {
        return $this->factory->exists($path);
    }
    public function share($key, $value)
    {
        return $this->factory->share($key, $value);
    }
    public function render($path, $vars = [])
    {
        return $this->factory->make($path, $vars)->render();
    }
}
