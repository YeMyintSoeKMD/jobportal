<script setup lang="ts">
// Shadcn ui imports
import { Button } from '@/components/ui/button';
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog'

// Lucide icons imports

// Vue, inertia & other libraries imports
import { Head, router, useForm } from '@inertiajs/vue3';

// Routes & controllers imports
import CategoryController from '@/actions/App/Http/Controllers/CategoryController';

// Types imports

// Custom components imports

import AppLayout from '@/layouts/AppLayout.vue';
import { Loader, LoaderCircle } from 'lucide-vue-next';
</script>

<template>
    <Head title="Categories Create" />

    <AppLayout>
        <div class="max-w-2xl flex-1 rounded-xl p-6">
            <h4 class="text-xl font-bold">Generate Resume</h4>
            <div class="grid grid-cols-2 gap-x-4 my-4">
                <div class="border border-red-500">
                    <img src="/photos/resume1.jpg" alt="">
                </div>
                <div class="border border-green-500">
                    <img src="/photos/resume2.jpg" alt="">
                </div>
            </div>
            <Dialog>
            <DialogTrigger>
                <Button>Generate Resume (Pro version)</Button>
            </DialogTrigger>
            <DialogContent>
            <DialogHeader>
                <DialogTitle>Generating a Resume</DialogTitle>
                <DialogDescription>
                To generate a Resume, you have to pay extra cost
                </DialogDescription>
            </DialogHeader>
            <div>
                Fee: 200000 MMK
            </div>
            </DialogContent>
        </Dialog>
        </div>
    </AppLayout>
</template>
