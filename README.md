# Yii2 swiper js 8 slider widget

## About
This is yii2 extention widget renders js slider [Swiper](https://github.com/nolimits4web/swiper).
This widget allows render slider in web page simply. Created for Yii2 framework.

This widget is based on the work of [coderius](https://github.com/coderius/yii2-swiper-slider).

The sole purpose of this repository is to upgrade the swiperjs library to the latest version.

![Yii2 swiper slider widget example](https://raw.githubusercontent.com/coderius/github-images/master/ezgif.com-gif-maker.gif "Yii2 swiper slider widget example")

![Yii2 swiper slider widget example](https://raw.githubusercontent.com/coderius/github-images/master/FireShotCapture015-SwiperDemos-swiperjs.com.png "Yii2 swiper slider widget example")

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

First download extention. Run the command in the terminal:
```
composer require algsupport/yii2-swiperjs-8:^1.0
```

or add in composer.json
```
"algsupport/yii2-swiperjs-8": "^1.0"
```
and run `composer update`

## Usage

### Widger with minimum options

You can only specify content for slides. This parameter is required.

In all files with widget put namespace to use class like:
```
<?php
namespace yournamespace

use algsupport\yii2-swiperjs-8\SwiperSlider;

//Code ...
```

In view file render widget:
```
<?php
    echo \algsupport\yii2-swiperjs-8\SwiperSlider::widget([
        'slides' => [
            'one',
            'two',
            'three',
            '<img src="https://swiperjs.com/demos/images/nature-1.jpg">',
            '<img src="https://swiperjs.com/demos/images/nature-2.jpg">'
        ],
    ]);
?>
```
### Widget with more options:

You can customize the parameters of the widget

In view file render widget:
```
<?php
    echo \algsupport\yii2-swiperjs-8\SwiperSlider::widget([
        // 'on ' . \algsupport\yii2-swiperjs-8\SwiperSlider::EVENT_AFTER_REGISTER_DEFAULT_ASSET => function(){
        //     CustomAsset::register($view);
        // },
        'showScrollbar' => true,
        'slides' => [
            [
                'value' => 'ggg',
                'options' => [
                    'style' => ["background-image" => "url(https://swiperjs.com/demos/images/nature-1.jpg)"]
                ]
            ],
            '<img src="https://swiperjs.com/demos/images/nature-2.jpg">',
            'one',
            'two',
            'three',
            'fore',
            'five'
        ],
        // 'assetFromCdn' => true,
        'clientOptions' => [
            'slidesPerView' => 4,
            'spaceBetween'=> 30,
            'centeredSlides'=> true,
            'pagination' => [
                'clickable' => true,
                'renderBullet' => new \yii\web\JsExpression("function (index, className) {
                        return '<span class=\"' + className + '\">' + (index + 1) + '</span>';
                    },
                "),
                ],
                "scrollbar" => [
                    "el" => \algsupport\yii2-swiperjs-8\SwiperSlider::getItemCssClass(SwiperSlider::SCROLLBAR),
                    "hide" => true,
                ],
        ],

        //Global styles to elements. If create styles for all slides
        'options' => [
            'styles' => [
                \algsupport\yii2-swiperjs-8\SwiperSlider::CONTAINER => ["height" => "100px"],
                \algsupport\yii2-swiperjs-8\SwiperSlider::SLIDE => ["text-align" => "center"],
            ],
        ],
            
    ]);
?>
```

### Widget options

__Events__:
* EVENT_BEFORE_REGISTER_DEFAULT_ASSET
* EVENT_AFTER_REGISTER_DEFAULT_ASSET

Usage in widget:
```
echo \algsupport\yii2-swiperjs-8\SwiperSlider::widget([
    ...
'on ' . \algsupport\yii2-swiperjs-8\SwiperSlider::EVENT_AFTER_REGISTER_DEFAULT_ASSET => function(){
        CustomAsset::register($view);
},
```
__showScrollbar__: true | false. Default is false

__showPagination__: true | false. Default is true

__slides__: string | array | . Contents slides content like <img> or any string. Or array with keys: *value*, *options*. *value* maybe like 
string or Closure (function($tag, $index, $self){}). Example:
```
'slides' => [
        [
            'value' => 'ggg',
            'options' => [
                'style' => ["background-image" => "url(https://swiperjs.com/demos/images/nature-1.jpg)"]
            ]
        ],
        [
            'value' => function($tag, $index, $self){
                return "some value {$index}";
            },
            'options' => [
                'style' => ["color" => "green"]
            ]
        ],
...
```
__clientOptions__: array. This options is pasted when initialize Swiper js (new Swiper('options here')).
Please, remember that if you are required to add javascript to the configuration of the js plugin and is required to be 
plain JS, make use of `JsExpression`. That class was made by Yii for that specific purpose. For example:
```
'clientOptions' => [
    'slidesPerView' => 4,
    'spaceBetween'=> 30,
    'centeredSlides'=> true,
    'pagination' => [
        'clickable' => true,
        'renderBullet' => new \yii\web\JsExpression("function (index, className) {
                return '<span class=\"' + className + '\">' + (index + 1) + '</span>';
            },
        "),
        ],
        "scrollbar" => [
            "el" => \algsupport\yii2-swiperjs-8\SwiperSlider::getItemCssClass(SwiperSlider::SCROLLBAR),
            "hide" => true,
        ],
],
```
__options__: array. This options is pasted when rendered dom elements. Various attributes for html elements are set here.
This params allowed only for all template items:
```
//Global styles to elements. If create styles for all slides
'options' => [
    'styles' => [
        \algsupport\yii2-swiperjs-8\SwiperSlider::CONTAINER => ["height" => "100px"],
        \algsupport\yii2-swiperjs-8\SwiperSlider::SLIDE => ["text-align" => "center"],
    ],
    'class' => [\algsupport\yii2-swiperjs-8\SwiperSlider::CONTAINER => ["myClass"],]
],

```

It is best to use constants to specify template elements:
* CONTAINER = 'container';
* WRAPPER = 'wrapper';
* SLIDE = 'slide';
* PAGINATION = 'pagination';
* BUTTON_PREV = 'button-prev';
* BUTTON_NEXT = 'button-next';
* SCROLLBAR = 'scrollbar';

## Credits

- [Sergio Coderius](https://github.com/coderius)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
