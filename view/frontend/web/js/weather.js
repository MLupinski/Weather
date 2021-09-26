define([
    'jquery',
    'mage/translate'
], function ($, $t) {
    "use strict";

    return function (config, element) {
        $(document).ready(function () {
            function getWeatherData() {
                try {
                    $.ajax({
                        showLoader: false,
                        url: 'updateweather',
                        type: "GET",
                        dataType: 'json'
                    }).success(function (data) {
                        $('.weather-town').html('<h2>' + data.name.split(' ')[0] + '</h2>');
                        $('.weather-description').children('img').attr('src', 'http://openweathermap.org/img/w/' + data.weather[0].icon + '.png');
                        $('.current-temp').html('<h2>' + Math.round(data.main.temp - 273.15) + ' &deg;C' + '</h2>');
                        $('.other-info').html(
                            $t('Max temp. ') + Math.round(data.main.temp_max - 273.15) + ' &deg;C <br/>'
                            + $t('Min temp. ') + Math.round(data.main.temp_min - 273.15) + ' &deg;C <br/>'
                            + $t('Wind Speed: ') + data.wind.speed
                        );
                    });
                } catch (e) {
                    console.log(e);
                }
            }

            setInterval(getWeatherData,600000);
            getWeatherData();
        });
    }
});
