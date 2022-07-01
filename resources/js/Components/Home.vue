<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fibonacci Form</div>

                    <div class="card-body">
                        <div style="margin-bottom:1em;">Please input a number here, and the total Fibonocci count will display up till that integer.</div>
                         <div class="fib-form">
                            <input id="fib-input" type="number" placeholder="Input" v-model='userInput'>
                            <button id="fib-button" @click="getFib()">Submit</button>  
                        </div>
                    </div>
                    <div v-if="this.results" class="card-footer">
                        {{ this.results }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from 'axios';
export default {
    data() {
        return {
            results: '',
            userInput: ''
        };
    },
    methods: {

        async getFib() {
            try {
                const results = await Axios.post('/api/fib/results', {
                    number: this.userInput
                });

                this.results = results.data;
            }
            catch (e) {
                this.results = e.response.data.message;
                console.log(e)
            }
        },
    }
}
</script>
