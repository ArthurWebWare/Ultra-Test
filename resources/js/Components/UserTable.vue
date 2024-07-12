<script setup>
import {ref, onMounted} from "vue";
import axios from "axios";

const users = ref([]);

onMounted(async () => {
    const response = await axios.get('users');
    users.value = response.data;
});
</script>

<template>
    <div>
        <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">User list</h3>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td class="py-2">{{ user.id }}</td>
                <td class="py-2">{{ user.name }}</td>
                <td class="py-2">{{ user.email }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}
</style>
