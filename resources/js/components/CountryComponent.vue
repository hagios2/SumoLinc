<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="chat-header">
            <img src="" alt="friend-display-profile">
            <span class="fa fa-" id="active"><span>
        </div>
        <div class="chat-body">
            <span class="msg-container"></span>
        </div>
        <div class="chat-footer">
            <div class="chat-opts">
                <form action="" method="post">
                    <input type="text" name="message" placeholder="type a message">
                </form>
                <ul>
                    <li class="fa fa-"></li>
                    <li class="fa fa-"></li>
                    <li class="fa fa-"></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
    form{
        float: left
    }
    ul{
        float: right
    }
    ul li{
        list-style-type: none;
    }
    img{
        float: left;
    }
    span#active{
        float: right;
    }
</style>

