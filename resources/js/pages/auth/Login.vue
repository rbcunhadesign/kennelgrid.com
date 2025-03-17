<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />

    <form
        @submit.prevent="submit"
        class="space-y-4"
    >
        <div>
            <input
                type="email"
                v-model="form.email"
                placeholder="Email"
                required
                autofocus
                autocomplete="username"
            />
        </div>

        <div>
            <input
                type="password"
                v-model="form.password"
                placeholder="************"
                required
                autocomplete="current-password"
            />
        </div>

        <button type="submit">Submit</button>
    </form>
</template>
