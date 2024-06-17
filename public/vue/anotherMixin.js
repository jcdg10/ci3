var anotherMixin = {
    data: {
        myVariable: 10,
    },
    methods: {
        created: function(){
            console.log(this.myVariable++);
        }
    }
};