// resources/js/Components/DeleteUser.vue
<template>
    <button @click="deleteUser" class="text-red-600">
        Delete
    </button>
</template>

<script>
export default {
    props: ['userId'],
    methods: {
        deleteUser() {
            if (confirm('Are you sure you want to delete this user?')) {
                // Perform the DELETE request
                fetch(`/delete-user/${this.userId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Optionally handle the response (e.g., show a message or update the UI)
                    if (data.success) {
                        alert('User deleted successfully');
                        // Optionally remove the user from the UI
                        this.$emit('deleted', this.userId);
                    } else {
                        alert('An error occurred while deleting the user.');
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('An error occurred while deleting the user.');
                });
            }
        }
    }
}
</script>
