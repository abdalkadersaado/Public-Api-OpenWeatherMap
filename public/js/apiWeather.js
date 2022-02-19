/**
 *  script to deal with public api open weather map
 *
 */
const main = document.getElementById("main");
const form = document.getElementById("form");
const search = document.getElementById("search");

form.addEventListener("submit", (e) => {
    e.preventDefault();

    const city = search.value;
    CITY_NAME = JSON.parse(JSON.stringify(city));

    $.ajax({
        url: `http://127.0.0.1:8000/apiWeather?city=${CITY_NAME}`,
        type: "Get",
        success: function (response) {
            if (response.status == true) {
                console.log(response.status);
                addWeatherToPage(response);
            }
        },
    });
});

function addWeatherToPage(data) {
    const temp = data.data.temperature;

    const weather = document.createElement("div");
    weather.classList.add("weather");

    weather.innerHTML = `
                    <h2><img src="https://openweathermap.org/img/wn/${data.data.temperature_current_weather_icon}@2x.png" /> ${temp}°C <img src="https://openweathermap.org/img/wn/${data.data.temperature_current_weather_icon}@2x.png" /></h2>
                    <small>${data.data.temperature_current_weather}</small>
                    <h4>${data.data.temperature_current_weather_description}</h4>
                `;
    // cleanup
    main.innerHTML = "";
    main.appendChild(weather);
}
