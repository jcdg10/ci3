<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    <style>
        #canvas {
            width: 600px;
            padding: 200px 20px;
            text-align: center;
            border: 1px solid #333;
        }
        span {
            background: red;
            display: inline-block;
            padding: 10px;
            color: #fff;
            margin: 10px 0;
        }
        .available span{
            background: green;
        }
        .nearby span:after{
            content: "nearby";
            margin-left: 10px;
        }

        #bag{
            width: 200px;
            height: 500px;
            margin: 0 auto;
            background: url(public/img/bag.png) center no-repeat;
            background-size: 80%;
        }
        /*url(<?php echo base_url().$image;?>)*/
        #bag.burst{
            background-image: url(public/img/bag-burst.png);
        }

        #bag-health{
            width: 200px;
            border: 2px solid #000;
            margin: 0 auto 20px auto;
        }

        #bag-health div{
            height: 20px;
            background: crimson
        }

        #controls{
            width: 120px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="jumbotron">
                <p>{{ greet("morning") }}</p>
                <p>Name: {{ name }}</p>
                <p>Job: {{ job }}</p>
            </div>
        </div>
        

        <div class="container">
            <div class="jumbotron">
                <h1>Data Binding</h1>
                <a v-bind:href="website" target="_blank">Bootstrap</a>
                <input type="text" v-bind:value="job" class="form-control">
                <p v-html="websiteTag"></p>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron">
                <h1>Events</h1>
                <!--<button v-on:click="age++">Add a yer</button>-->
                <!--<p>{{ test() }}</p>   only in this case we need to add the parenthesis
                but in the next form it can be added or not-->
                <button @click="add(1)">Add a yer</button>
                <button v-on:click="subtract(1)">Subtract a yer</button>
                <button @dblclick="add(10)">Add 10 years</button>
                <button v-on:dblclick="subtract(10)">Subtract 10 years</button>
                <p>My age is {{age}} </p>
                <div id="canvas" v-on:mousemove="updateXY">
                    x {{x}}, y {{y}}
                </div>
                <!-- event modifiers  .stop, .prevent, .capture, .self, .once -->
                <a @click="click" href="https://getbootstrap.com/docs/4.1/components/card/">NOt to go</a>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron">
                <h1>Keyboard events</h1>
                <label>Name</label>
                <!-- you need to press enter to make valid the event -->
                <input type="text"  class="form-control" @keyup.enter="logName" v-model="name2" />
                <span>{{name2}}</span><br>
                <label>Age</label>
                <!-- you need to press alt + enter to make valid the event
                 if you don't need a modifier you can leave it without alt.enter, only keyup -->
                <input type="text"  class="form-control" @keyup.alt.enter="logAge" v-model="age2" />
                <span>{{age2}}</span><br>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron">
                <h1>Computed properties</h1>
                <button @click="a++">Add to A</button>
                <button @click="b++">Add to B</button>
                <p>A - {{a}}</p>
                <p>B - {{b}}</p>
                <p>Age + A =  {{ addToA }}</p>
                <p>Age + B =  {{ addToB }}</p>
            </div>
        </div>

        <div class="container">
            <h1>Dynamic CSS</h1>
            <h2>Example 1</h2>
            <div @click="available = !available" v-bind:class="{available: available}">
                <span>Ryu</span>
            </div>
            <h2>Example 2</h2>
            <button  @click="nearby = !nearby">Toggle nearby</button>
            <button  @click="available = !available">Toggle available</button>
            <div v-bind:class="compClasses">
                <span>Ryu</span>
            </div>
        </div>

        <div class="container">
            <h1>Conditionals</h1>
            <button @click="error = !error">Toggle error</button>
            <button @click="success = !success">Toggle success</button>
            <p v-if="error">There has been an error</p>
            <p v-else-if="success">Success</p>
            <p v-show="error">error 2</p>
            <p v-show="success">success 2</p>
            <p>CHeck</p>
        </div>

        <div class="container">
            <h1>Looping</h1>
            <ul>
                <li v-for="c in characters">{{c}}</li>
            </ul>

            <ul class="list-group mt-4">
                <li class="list-group-item" v-for="n in ninjas">{{n.name  + " " +  n.age}}</li>
            </ul>

            <!-- template is ignored and only print what is inside-->
            <template v-for="(ninja, index) in ninjas">
                <h3>{{index}}.{{ninja.name}}</h3>
                <p>{{ninja.age}}</p>
            </template>

            <template v-for="ninja in ninjas">
                <div v-for="(val,key) in ninja">
                    <p>{{key}} - {{val}}</p>
                </div>
            </template>
        </div>

        <div class="container">
            <h1>Game</h1>
            <!-- bag image -->
            <div id="bag" v-bind:class="{ burst: ended }"></div>

            <!-- bag health bar -->
            <div id="bag-health">
                <div v-bind:style="{ width: health + '%' }"></div>
            </div>

            <!-- game control buttons -->
            <div id="controls">
                <button v-on:click="punch" v-show="!ended">Punch</button>
                <button v-on:click="restart">Restart</button>
            </div>
                
        </div>

        <div class="container">
            <div class="jumbotron">
                <h1>Refs</h1>
                <input type="text" ref="input" />
                <input type="text" ref="input1" />
                <select class="form-control" ref="sel1"  @change="readRefs">
                    <option value="1">Primera</option>
                    <option value="2">Segunda</option>
                    <option value="3">Tercera</option>
                </select>
                <button @click="readRefs">Sumbit</button>
                <p>Your fav food: {{ output }}</p>
                <p>Selected option: {{ list.option }} - {{ list.text }}</p>

                <select v-model="selected">
                    <option v-for="product in products" v-bind:value="{ id: product.id, text: product.name }">
                      {{ product.name }}
                    </option>
                </select>
                <p>Value:
                    {{selected.id}}
                </p>
                  <p>Text:
                    {{selected.text}}
                  </p>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron">
                <h1>Mixins</h1>
                <button @click="clickHandler('aloha')">Mixin test</button>
                <button @click="created()">Another mixin test</button>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron">
            <h1>Solution</h1>
                <button @click="solution = !solution">Change</button>
                <div class="mb-4">
                    <div v-if="solution">
                        Nueva etiqueta
                    </div>
                </div>

                <ul>
                    <li v-for="(input, index) in inputs">
                      <input type="text" v-model="input.one"> - {{ input.one }}  
                      <input type="text" v-model="input.two"> - {{ input.two }}
                      <button @click="deleteRow(index)">Delete</button>
                    </li>
                </ul>
                <button @click="addRow" class="btn btn-info">Add row</button>
                <button @click="checkValueOne" class="btn btn-success">Check Values</button>

                <table>
                    <tr>
                        <td>
                            Nivel de medicion
                        </td>
                    </tr>
                    <tr v-for="(d, index) in data">
                        <td>
                            <select class="form-control" v-model="d.type">
                                <option value="1">Primera</option>
                                <option value="2">Segunda</option>
                                <option value="3">Tercera</option>
                            </select>
                                 - {{ d.type }}
                            <button @click="deleteData(index)">Delete</button>
                        </td>
                    </tr>
                </table>
                <button @click="addData" class="btn btn-info">Add data</button>
                <button @click="checkData" class="btn btn-success">Check Data</button>



                <table>
                    <tr>
                        <td>
                            Nivel de medicion por ref not working
                        </td>
                    </tr>
                    <tr v-for="(d, index) in dataR">
                        <td>
                            <select class="form-control" ref="selrefs">
                                <option value="1">Nuevo</option>
                                <option value="2">Semi</option>
                                <option value="3">Viejo</option>
                            </select>
                                 - {{ selrefs }}
                            <button @click="deleteDataR(index)">Delete</button>
                        </td>
                    </tr>
                </table>
                
                <button @click="addDataR" class="btn btn-info">Add data R</button>
                <button @click="checkDataR" class="btn btn-success">Check Data R</button>
            </div>    
        </div>

        
        
    </div>

    
    <div class="container">
        <h1>Multiple Vue instances</h1>
        <div id="vue-app-one">
            <greeting></greeting>
            <h2>{{ title }}</h2>
            <p>{{ greet }}</p>
        </div>
        <div id="vue-app-two">
            <greeting></greeting>
            <h2>{{ title }}</h2>
            <p>{{ greet }}</p>
            <button v-on:click="changeTitle">Change App One Title</button>
        </div>
    </div>

    <script src="public/vue/clickMixin.js"></script>
    <script src="public/vue/anotherMixin.js"></script>
    <script>
    
    var myApp = new Vue({
        el: "#app",
        data: {
            name:"Jules",
            job: "Ninja",
            website: "https://getbootstrap.com/docs/4.1/components/card/",
            websiteTag: "<a href='https://getbootstrap.com/docs/4.1/components/card/' target='_blank'>Website Tag</a>",
            age: 25,
            x: 0,
            y: 0,
            name2: "",
            age2: "",
            age3: 0,
            a: 0,
            b: 0,
            available: true,
            nearby: false,
            error: false,
            success: false,
            characters : ["Mario", "Luigi","Yoshi","Bowser"],
            ninjas : [
                { name:"John", age:15},
                { name:"Peter", age:17},
                { name:"Julio", age:12},
            ],
            health: 100,
            ended: false,
            output: 'Your fav food',
            list: {
                option: "Def",
                text: "textDef"
            },
            selected: '',
            products: [
                {id: 1, name: 'A'},
                {id: 2, name: 'B'},
                {id: 3, name: 'C'}
            ],
            inputs: [],
            data: [],
            dataR: [],
            solution: false,
        },
        mixins: [clickMixin, anotherMixin],
        methods: {
            greet: function(time){
                return "Good " + time + " " + this.name;
            },
            add: function(inc){
                this.age += inc;
            },
            subtract: function(inc){
                this.age -= inc;
            },
            updateXY: function(event){
                this.x = event.offsetX;
                this.y = event.offsetY;
            },
            click: function(e){
                e.preventDefault();
                alert("You clicked me");
            },
            logName: function(){
                console.log('you entred your nme');
            },
            logAge: function(){
                console.log('you entred your age');
            },
            punch: function(){
                this.health -= 10;
                if ( this.health <= 0 ){
                    this.ended = true;
                }
            },
            restart: function(){
                this.health = 100;
                this.ended = false;
            },
            readRefs: function(){
                console.log(this.$refs);
                this.output = this.$refs.input.value;
                this.list.option = this.$refs.sel1.value
                this.list.text = this.$refs.sel1.options[this.$refs.sel1.selectedIndex].text
            },
            addRow() {
                this.inputs.push({
                    one: '',
                    two: ''
                })
            },
            deleteRow(index) {
                this.inputs.splice(index,1)
            },
            checkValueOne() {
                console.log(this.inputs);
                this.inputs.forEach((el) => console.log(el.one));
            },
            addData() {
                this.data.push({
                    type: ''
                })
            },
            deleteData(index) {
                this.data.splice(index,1)
            },
            checkData() {
                console.log(this.data);
                this.data.forEach((el) => {
                        console.log(el.type);
                        if(el.type == 2){
                            this.solution = true;
                        }
                    }
                );
            },
            addDataR() {
                this.dataR.push({
                    type: ''
                })
            },
            deleteDataR(index) {
                this.dataR.splice(index,1)
            },
            checkDataR() {
                console.log(this.dataR);
                this.dataR.forEach((el) => {
                        console.log(el);
                        if(el == 2){
                            this.solution = true;
                        }
                    }
                );
            }
        },
        computed: {
            addToA: function(){
                console.log("A");
                return this.a + this.age3;
            },
            addToB: function(){
                console.log("B");
                return this.b + this.age3;
            },
            compClasses: function(){
                return {
                    available: this.available,
                    nearby: this.nearby
                }
            }
        }
    });

    /*var data = {
        name: 'Yoshii'
    } if i get the value from outside the name of alla the componets will change.*/
    Vue.component('greeting', {
        template:'<p> I am a reusbale component, I am {{ name }} <button @click="changeName">Change name</button></p>',
        data: function(){
            return {
                name: 'Yoshi'
            }
        },
        methods: {
            changeName: function(){
                this.name = "Mario";
            }
        }
    });

    var one = new Vue({
        el: '#vue-app-one',
        data: {
        title: 'Vue App One'
        },
        computed: {
        greet: function(){
            return 'Hello, from app one :)';
        }
        }
    });

    

    var two = new Vue({
        el: '#vue-app-two',
        data: {
        title: 'Vue App Two'
        },
        computed: {
        greet: function(){
            return 'Yo dudes, this is app 2 speaking to ya';
        }
        },
        methods: {
        changeTitle: function(){
            one.title = 'Title Changed';
        }
        }
    });

    two.title = 'Changed from outside';
    </script>
</body>
</html>