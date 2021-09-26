# MagentoWeatherModule
Moduł Pogodowy Magento 2.4.x 

Aby aktywować moduł należy wrzucić go do folderu <b>app/code/HTCode/Weather</b>

Następnie zalogować się do panelu administratora i przejść do konfiguracji modułu w <b>Stores->configuration->Weather Module->Module Configuration</b>.

![image](https://user-images.githubusercontent.com/12450934/134821654-b9bf7246-fb85-45a7-b785-9e7524584f37.png)


W konfiguracji należy <b>włączyć</b> moduł, podać <b>klucz API</b> do OpenWeatherMap API, z którym połączony jest moduł, klucz można wygenerować na stronie https://openweathermap.org/ po założeniu konta i wpisać go w polu API KEY oraz również należy podać <b>miasto</b>, dla którego chcemy pobrać pogodę i zapisać dane wciskając przycisk Save.

![image](https://user-images.githubusercontent.com/12450934/134821704-c1224018-af7e-41a1-aced-f8e6726abf64.png)

Jeżeli chcemy sprawdzić całą historię pobieranej pogody, należy przejść do panelu administratora do <b>Weather->Weather History</b>

![image](https://user-images.githubusercontent.com/12450934/134821767-ef6e5d7d-dccb-4c7a-a7fb-9cffe3762081.png)

Dane z pogody możemy filtrować według daty pobrania, temperatury maksymalnej, minimalnej i obecnej, a także wyszukać po nazwie miasta, czy też opisie pogody.

![image](https://user-images.githubusercontent.com/12450934/134821789-d127892b-204f-4d6a-a2c8-dcc9dad03c98.png)
![image](https://user-images.githubusercontent.com/12450934/134821809-a78f2d56-b927-44e5-8201-1844a6f45f0d.png)

Gdy już uzupełnimy nasze dane i je zapiszemy należy wyczyścić cache i odświeżyć stronę. W stopce powinna pojawić się informacja na temat pogody w wybranym przez nas mieście.

![image](https://user-images.githubusercontent.com/12450934/134821965-60b8421a-d0ad-439b-9999-b52b6b2b5293.png)
