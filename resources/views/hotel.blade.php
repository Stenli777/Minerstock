<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hosting Company Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .main-img {
            width: 100%;
            height: auto;
        }
        .thumbnail-img {
            cursor: pointer;
        }
        .tags {
            margin-top: 20px;
        }
        .tags .badge {
            font-size: 1rem;
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>New Hosting Company Туим</h1>
            <p><i class="bi bi-geo-alt-fill"></i> Россия, Туим</p>
            <ul class="list-unstyled">
                <li><strong>Цена:</strong> от 4.90₽/Вт Месяц</li>
                <li><strong>Макс. количество:</strong> 100 Устройств</li>
                <li><strong>Тип энергии:</strong> Гидроэнергетика / Электрический</li>
                <li><strong>Мощность:</strong> 28 МВт</li>
            </ul>
            <p>New Hosting Company – один из крупнейших легальных майнинговых комплексов, ...</p>

            <!-- Теги -->
            <div class="tags">
                <span class="badge bg-primary">Договор</span>
                <span class="badge bg-success">Безналичный расчет</span>
                <span class="badge bg-info">Техническая поддержка</span>
                <span class="badge bg-warning text-dark">Продажа оборудования</span>
            </div>

            <!-- Кнопка заявки -->
            <button class="btn btn-primary mt-3">Заявка на размещение</button>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-center">
                <img id="mainImage" src="https://via.placeholder.com/600x400" class="main-img" alt="Main Image">
            </div>
            <div class="d-flex mt-3 justify-content-center">
                <img src="https://via.placeholder.com/100x100" class="thumbnail-img mx-2" alt="Thumbnail 1" onclick="changeImage(this)">
                <img src="https://via.placeholder.com/100x100" class="thumbnail-img mx-2" alt="Thumbnail 2" onclick="changeImage(this)">
                <img src="https://via.placeholder.com/100x100" class="thumbnail-img mx-2" alt="Thumbnail 3" onclick="changeImage(this)">
                <img src="https://via.placeholder.com/100x100" class="thumbnail-img mx-2" alt="Thumbnail 4" onclick="changeImage(this)">
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(element) {
        var mainImage = document.getElementById('mainImage');
        mainImage.src = element.src;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
