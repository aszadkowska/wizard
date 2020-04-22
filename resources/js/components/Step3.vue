<template>
    <div class="panel panel-default">
        <div class="panel-heading">Wybierz litery</div>
        <div class="panel-body">
            <form action="./step3" method="POST" @submit.prevent="saveData()">
                <button class="btn btn-info pull-right"
                        type="submit">Dodaj
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Step3",
        props: ['data'],
        methods: {
            saveData(){
                axios.post("./step3", [this.data]).then(response => {
                    this.$emit('site-details', {step: '3', data: response.data});
                });
            },
        },
    }
</script>
