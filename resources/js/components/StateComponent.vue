<template>
    <div class="container">
        <div class="form-group row">

            <label class="col-md-2 text-md-right" for="Country"><i class="fas fa-city"></i> Country</label>
            <select class="form-control col-md-8" name="country" style="width:60%" v-model="selectedCountry" @change="changeCountry($event)">
                <option value="" selected disabled v-if="selectedCountry == ''">Select Country</option>
                <option :value="selectedCountry" selected v-else>{{ selectedCountry }}</option>
                <option v-for="country in countries">{{ country.name.common }}</option>

            </select>


        </div>
        <div class="form-group row">

            <label class="col-md-2 text-md-right" for="Country"><i class="fas fa-city"></i> State</label>
            <select class="form-control col-md-8" style="width:60%" name="state" v-model="selectedState" @change="changeState($event)">
                <option value="" selected disabled v-if="selectedState == ''">Select State</option>
                <option :value="selectedState" selected v-else>{{ selectedState }}</option>
                <option v-for="state in states">{{ state }}</option>
             </select>


        </div>


    </div>
</template>

<script>
    export default {
        data(){
            return {
                selectedCountry: "",
                countries: [],
                selectedState: "",
                states: []
            }
        },
        created(){
            console.log(window.location.href);
            var url = window.location.href;
            var reg = (/(http:\/\/127.0.0.1:8000\/profile\/)([0-9])+(\/)[a-zA-Z]*/);
            var test = reg.test(url);
            if(test === true){
                axios({
                url: "/user/profile/country",
                method: "get",
                dataType: "json"
            })
            .then(res=>{
                console.log(res.data.data);
                if(res.data.data){
                    this.selectedCountry = res.data.data[0].country;
                    this.selectedState = res.data.data[0].State;
                    console.log(this.selectedState);
                }
            })
            .catch(err =>{
                console.log("an error has occured: " + err);
            })
            }
            axios({
                url: "/allcountries",
                method:"get",
                dataType: "json"
            })
            .then(res =>{
                if(res.data.data){
                    this.countries = res.data.data;
                }
                else if(res.data == "error"){

                }
            })
            .catch(err =>{
                console.log("an error occured during the ajax call: " + err)
            })
        },
        methods:{

            changeCountry: function($event){
                this.selectedCountry = $event.target.value;

                // making an ajax call to get all states related to the country
                axios({
                    url: `/getstates/${this.selectedCountry}`,
                    method: "get",
                    dataType: "json"
                })
                .then(res =>{
                    if(res.data.data){
                        this.states = res.data.data;
                    }
                })
                .catch(err =>{
                    console.log("an internal error occured: " + err);
                })
            },
            changeState: function($event){
                this.selectedState = $event.target.value;
            }
        }
    }

</script>
