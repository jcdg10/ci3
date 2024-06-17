<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="jumbotron">
                <input type="text" v-model="edad">
                <h1 v-show="edad>=18">Eres mayor de edad</h1>
            </div>
        </div>

        <div class="container mt-4">
            <button class="btn btn-info" v-on:click="kiss++">
                Kiss {{kiss}}
            </button>
            <p v-if="kiss<3">
                Sapo
            </p>
            <p v-else>
                Principe
            </p>
        </div>

        <div class="container mt-4">
            <div class="jumbotron">
                <ul class="list-group">
                    <li class="list-group-item" v-for="el in tareas">{{el}}</li>
                </ul>
                <ul class="list-group mt-4">
                    <li class="list-group-item" v-for="el in personas">{{el.nombre  + " " +  el.edad}}</li>
                </ul>
            </div>
        </div>


        <div class="container mt-4">
            <div class="jumbotron">
                <template v-for="l in lista">
                    <div class="card mt-2" style="width: 18rem;">
                        <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1901d036287%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1901d036287%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{ l.titulo }}</h5>
                          <p class="card-text">{{ l.descripcion }}</p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        
    </div>

    <script>
    var myApp = new Vue({
        el: "#app",
        data: {
            edad:19,
            kiss: 0,
            tareas : ["HTML", "CSS3","VUE"],
            personas : [
                { nombre:"John", edad:15},
                { nombre:"Peter", edad:17},
                { nombre:"Julio", edad:12},
            ],
            lista : [
                { titulo: "Correo 1", descripcion: "Descripcion 1"},
                { titulo: "Correo 2", descripcion: "Descripcion 2"},
                { titulo: "Correo 3", descripcion: "Descripcion 3"},
            ]
        }
    });
    </script>
</body>
</html>