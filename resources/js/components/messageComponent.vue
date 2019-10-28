<template>
    <div class="container">
        <div class="reciever">
            <span>
                {{ recievedMessage }}
            </span>
        </div>
        <div class="sender">
            <span v-text="newMessage">
                {{ sentMessage }}
            </span>
        </div>
        <form>
            <textarea v-model="newMessage">

            </textarea>
            <button @click="sendMessage">send</button>
        </form>
    </div>
</template>

<script>
    export default {
        created(){
            var reg = /(http:\/\/127.0.0.1:8000\/message\/)[0-9]+/;
            var url = window.location.href;
            var test = reg.test(url);
            if(test === true){
                axios({
                url: "",
                dataType: "json",
                method: "get"
            })
            .then(res => {
                this.sentMessage = res.data.message
                this.recievedMessage = res.data.message
            })
            .catch(err => {
                console.log("an error occured while trying to make the ajax request: "+ err)
            })
        }
        },
        methods: {
            sendMessage: function(){
                axios({
                    url: "/messages",
                    data: {message: this.newMessage},
                    dataType: "json",
                    method: "post"
                })
                .then(res => {
                    if(res.data){
                        this.newMessage = "";
                        this.newMessage = res.data.message
                    }
                })
                .catch(err => {
                    console.log("an error occured while trying to make an ajax call: " + err)
                })
            }
        },
        data(){
            return {
                message: "",
                sentMessage: [],
                recievedMessage: [],
                newMessage: ""
            }
        }
    }
</script>
<style scoped>
    .container .reciever{
        max-width: 100%;
        float: left
    }
    .container .sender{
        max-width: 100%;
        float:right
    }
</style>

