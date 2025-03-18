<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { Button, InputText, Password } from 'primevue';

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
            <InputText
                type="email"
                v-model="form.email"
                placeholder="Email"
                required
                autofocus
                autocomplete="username"
            />
        </div>

        <div>
            <Password
                type="password"
                v-model="form.password"
                placeholder="************"
                required
                autocomplete="current-password"
                :feedback="false"
            />
        </div>

        <Button
            type="submit"
            label="Login"
            :loading="form.processing"
        />
    </form>
</template>
