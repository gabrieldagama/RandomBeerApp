<template>
    <div class="App">
        <header class="App-header">
            <h1 class="App-title">Vue Random Beer App!</h1>
            <button @click="getRandomBeer">Show another beer</button>
        </header>
        <div class="App-body">
            <div class="left-container">
                <img src="../assets/beer-icon.png" alt="Beer Icon"/>
            </div>
            <div class="right-container">
                <div class="beer-data">
                    <div class="beer-name"><h2>{{beer.name}}</h2>
                    </div>
                    <div class="beer-details">
                        <label>Description:</label>
                        <p class="description">{{beer.description}}</p>
                        <label>Abv:</label>
                        <p class="abv">{{beer.abv}}</p>
                        <label>Producer Location:</label>
                        <p class="producer-location">{{beer.producerLocation}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                token: null,
                beer: {
                    name: null,
                    description: '',
                    abv: null,
                    producerLocation: false
                }
            };
        },
        methods: {
            getToken() {
                var config = {
                    auth: {
                        username: 'apiuser',
                        password: 'apipwd'
                    }
                };
                var context = this;
                return axios.get(
                    'http://localhost/v1/auth/token',
                    config
                ).then(function(response) {
                    context.token = response.data.data.token;
                });
            },
            getRandomBeer() {
                var context = this;
                if (this.token === null) {
                    this.getToken().then(() => {
                        context.getRandomBeer();
                    });
                    return false;
                }
                var config = {
                    headers: {'Authorization': 'Bearer ' + this.token}
                };
                axios.get(
                    'http://localhost/v1/beer/random',
                    config
                ).then(function(response) {
                    context.beer.name = response.data.data.name;
                    context.beer.description = response.data.data.description;
                    context.beer.abv = response.data.data.abv;
                    context.beer.producerLocation = response.data.data.producerLocation;
                });
            }
        },
        mounted() {
            this.getRandomBeer();
        },
    };
</script>
