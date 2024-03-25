<?php 

if(!function_exists('df_loading_spinner_pulse')) {
    function df_loading_spinner_pulse() {
        $loading_animation_image = df_options('loading_animation_color');

        $html = '';
        $html .= '<div class="pulse" style="background-color:'.$loading_animation_image.'"></div>';
        return $html;
    }
}

if(!function_exists('df_loading_spinner_double_pulse')) {
    function df_loading_spinner_double_pulse() {
        $loading_animation_image = df_options('loading_animation_color');

        $html = '';
        $html .= '<div class="double_pulse">';
        $html .= '<div class="double-bounce1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="double-bounce2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('df_loading_spinner_cube')) {
    function df_loading_spinner_cube() {
        $loading_animation_image = df_options('loading_animation_color');

        $html = '';
        $html .= '<div class="cube" style="background-color:'.$loading_animation_image.'"></div>';
        return $html;
    }
}

if(!function_exists('df_loading_spinner_rotating_cubes')) {
    function df_loading_spinner_rotating_cubes() {
        $loading_animation_image = df_options('loading_animation_color');

        $html = '';
        $html .= '<div class="rotating_cubes">';
        $html .= '<div class="cube1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="cube2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('df_loading_spinner_stripes')) {
    function df_loading_spinner_stripes() {
        $loading_animation_image = df_options('loading_animation_color');

        $html = '';
        $html .= '<div class="stripes">';
        $html .= '<div class="rect1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="rect2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="rect3" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="rect4" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="rect5" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';
        return $html;
    }
}

if(!function_exists('df_loading_spinner_wave')) {
    function df_loading_spinner_wave() {
        $loading_animation_image = df_options('loading_animation_color');

        $html = '';
        $html .= '<div class="wave">';
        $html .= '<div class="bounce1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="bounce2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="bounce3" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('df_loading_spinner_two_rotating_circles')) {
    function df_loading_spinner_two_rotating_circles() {
        $loading_animation_image = df_options('loading_animation_color');

        $html = '';
        $html .= '<div class="two_rotating_circles">';
        $html .= '<div class="dot1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="dot2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('df_loading_spinner_five_rotating_circles')) {
    function df_loading_spinner_five_rotating_circles() {
        $loading_animation_image = df_options('loading_animation_color');

        $html = '';
        $html .= '<div class="five_rotating_circles">';
        $html .= '<div class="spinner-container container1">';
        $html .= '<div class="circle1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="circle2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="circle3" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="circle4" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';
        $html .= '<div class="spinner-container container2">';
        $html .= '<div class="circle1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="circle2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="circle3" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="circle4" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';
        $html .= '<div class="spinner-container container3">';
        $html .= '<div class="circle1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="circle2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="circle3" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="circle4" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }
}