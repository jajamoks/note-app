<template>
    <div>
        <form @submit.prevent="submitForm">
            <InputField name="name" label="Note Name" :errors="errors"
            placeholder="Name" @update:field="form.name = $event" />
            <InputField name="description" label="Description" :errors="errors"
            placeholder="Description" @update:field="form.description = $event" />
            <input-select v-model="form.status" :error="errors" class="pr-6 pb-8 w-full lg:w-1/2" label="Status">
                <option :value="null">Select Status</option>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </input-select>
            <div class="flex justify-end">
                <button class="py-2 px-4 rounded bg-red-600 text-white border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-gray-700 py-2 px-4 text-white rounded hover:bg-gray-600">Add New Note</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';
    import InputSelect from '../components/InputSelect';

    export default {
        name: "NotesCreate",

        components: {
            InputField,
            InputSelect
        },

        data: function () {
            return {
                form: {
                    name: '',
                    description: '',
                    status: null,
                },

                errors: null,
            }
        },

        methods: {
            submitForm: function () {
                axios.post('/api/notes', this.form)
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
