<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div v-if="notes.length === 0">
                <p>No note yet. <router-link to="/note/create">Get Started ></router-link></p>
            </div>

            <div v-for="note in notes">
                <router-link :to="'/notes/' + note.data.note_id" class="flex items-center border-b border-gray-400 p-4 hover:bg-gray-100">

                    <div class="pl-4">
                        <p class="text-gray-800 font-bold">{{ note.data.description }}</p>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NotesList",
        props: [
            'endpoint',
        ],

        mounted() {
            axios.get(this.endpoint)
                .then(response => {
                    this.notes = response.data.data;

                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;

                    alert('Unable to fetch notes.');
                });
        },

        data: function () {
            return {
                loading: true,
                notes: null,
            }
        }
    }
</script>

<style scoped>

</style>
