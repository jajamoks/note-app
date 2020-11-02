<template>
    <div>
        <div class="flex justify-between">
            <a href="#" class="text-blue-400" @click="$router.back()">
                < Back
            </a>
        </div>

        <form @submit.prevent="submitForm" class="pt-6">
            <InputField name="name" label="Note Name" :errors="errors"
            placeholder="Note Name" @update:field="form.name = $event" :data="form.name" />
            <InputField name="description" label="Description" :errors="errors"
            placeholder="Description" @update:field="form.description = $event" :data="form.description" />

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';

    export default {
        name: "Notes",

        components: {
            InputField
        },

        mounted() {
            axios.get('/api/notes/' + this.$route.params.id)
                .then(response => {
                    this.form = response.data.data;

                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;

                    if (error.response.status === 404) {
                        this.$router.push('/notes');
                    }
                });
        },

        data: function () {
            return {
                form: {
                    'name': '',
                    'description': '',
                },

                errors: null,
                loading: true,
            }
        },

        methods: {
            submitForm: function () {
                axios.patch('/api/notes/' + this.$route.params.id, this.form)
                    .then(response => {
                        this.$router.push(response.data.links.self);
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    });
            }
        }
    }
</script>

<style scoped>

</style>
