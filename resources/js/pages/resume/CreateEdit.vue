<script setup lang="ts">
// Shadcn ui imports
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

// Lucide icons imports

// Vue, inertia & other libraries imports
import { Head, router, useForm } from '@inertiajs/vue3';

// Routes & controllers imports
import CategoryController from '@/actions/App/Http/Controllers/CategoryController';

import {
  Select,
  SelectTrigger,
  SelectValue,
  SelectContent,
  SelectItem
} from "@/components/ui/select";

// Types imports

// Custom components imports

import AppLayout from '@/layouts/AppLayout.vue';
import ResumeController from '@/actions/App/Http/Controllers/ResumeController';
import Textarea from '@/components/ui/textarea/Textarea.vue';
import InputError from '@/components/InputError.vue';
import { ref } from 'vue';
import { Pencil, Trash2 } from 'lucide-vue-next';

// Props
const props = defineProps<{
    resume: any;
}>();

const jobLevels = [
    {value: 'entry', name: 'Entry'},
    {value: 'junior', name: 'Junior'},
    
    {value: 'mid', name: 'Mid'},
    {value: 'senior', name: 'Senior'},
    
    {value: 'manager', name: 'Manager'},
    {value: 'director', name: 'Director'},
    
]

const jobTypes = [
    {value: 'full-time', name: 'Full Time'},
    {value: 'part-time', name: 'Part Time'},
    
    {value: 'remote', name: 'Remote'},
    {value: 'internship', name: 'Internship'},
    
    {value: 'contract', name: 'Contract'},
]

// Form
const form = useForm({
    name: props.resume.name ?? '',
    image: null,
    title: props.resume.title ?? '',
    summary: props.resume.summary ?? '',
    experience_years: props.resume.experience_years ?? '',
    expected_salary: props.resume.expected_salary ?? '',
    job_level: props.resume.job_level ?? '',
    job_type: props.resume.job_type ?? '',
    location: props.resume.location ?? '',
    skills: props.resume.skills ?? [],
    languages : props.resume.languages ?? [],
    education: props.resume.education ?? [],
    certifications: props.resume.certifications ?? [],
    social: props.resume.social ?? [],
    status: props.resume.status ?? ''
});

const submit = () => {
    if (!props.resume.id) {
        form.submit(ResumeController.store());
    } else {
        // form.submit(ResumeController.update(props.resume.id));
        router.post(ResumeController.update(props.resume.id), { ...form as any, _method: 'put' })
    }

};

const skill = ref('');
const editskillKey = ref('');

const generateKey = () => {
    return Math.random().toString(36).substring(2, 7);
}

const handleskill = () => {
    if(!editskillKey.value){
        form.skills.push({key: generateKey(), name: skill.value});
    }else{
        form.skills = form.skills.map
        (
            (formskill: {key: string, name: string}) => formskill.key === editskillKey.value 
                ? 
                {key: editskillKey.value, name: skill.value} 
                : 
                formskill
        );
    }
    skill.value = '';
    editskillKey.value = '';
}

const editskill = (key: string) => {
    editskillKey.value = key;
    skill.value = form.skills.find((skill: {key: string, name: string}) => skill.key === key)?.name ?? '';
}

const removeskill = (key: string) => {
    form.skills = form.skills.filter((skill: any) => skill.key !== key);
}

const languages = ref('');
const editlanguagesKey = ref('');


const handlelanguages = () => {
    if(!editlanguagesKey.value){
        form.languages.push({key: generateKey(), name: languages.value});
    }else{
        form.languages = form.languages.map
        (
            (formlanguages: {key: string, name: string}) => formlanguages.key === editlanguagesKey.value 
                ? 
                {key: editlanguagesKey.value, name: languages.value} 
                : 
                formlanguages
        );
    }
    languages.value = '';
    editlanguagesKey.value = '';
}

const editlanguages = (key: string) => {
    editlanguagesKey.value = key;
    languages.value = form.languages.find((languages: {key: string, name: string}) => languages.key === key)?.name ?? '';
}

const removelanguages = (key: string) => {
    form.languages = form.languages.filter((languages: any) => languages.key !== key);
}

const education = ref('');
const editeducationKey = ref('');


const handleeducation = () => {
    if(!editeducationKey.value){
        form.education.push({key: generateKey(), name: education.value});
    }else{
        form.education = form.education.map
        (
            (formeducation: {key: string, name: string}) => formeducation.key === editeducationKey.value 
                ? 
                {key: editeducationKey.value, name: education.value} 
                : 
                formeducation
        );
    }
    education.value = '';
    editeducationKey.value = '';
}

const editeducation = (key: string) => {
    editeducationKey.value = key;
    education.value = form.education.find((education: {key: string, name: string}) => education.key === key)?.name ?? '';
}

const removeeducation = (key: string) => {
    form.education = form.education.filter((education: any) => education.key !== key);
}

const certification = ref('');
const editcertificationKey = ref('');


const handlecertification = () => {
    if(!editcertificationKey.value){
        form.certifications.push({key: generateKey(), name: certification.value});
    }else{
        form.certifications = form.certifications.map
        (
            (formcertification: {key: string, name: string}) => formcertification.key === editcertificationKey.value 
                ? 
                {key: editcertificationKey.value, name: certification.value} 
                : 
                formcertification
        );
    }
    certification.value = '';
    editcertificationKey.value = '';
}

const editcertification = (key: string) => {
    editcertificationKey.value = key;
    certification.value = form.certifications.find((certification: {key: string, name: string}) => certification.key === key)?.name ?? '';
}

const removecertification = (key: string) => {
    form.certifications = form.certifications.filter((certification: any) => certification.key !== key);
}


const social = ref('');
const editsocialKey = ref('');


const handlesocial = () => {
    if(!editsocialKey.value){
        form.social.push({key: generateKey(), name: social.value});
    }else{
        form.social = form.social.map
        (
            (formsocial: {key: string, name: string}) => formsocial.key === editsocialKey.value 
                ? 
                {key: editsocialKey.value, name: social.value} 
                : 
                formsocial
        );
    }
    social.value = '';
    editsocialKey.value = '';
}

const editsocial = (key: string) => {
    editsocialKey.value = key;
    social.value = form.social.find((social: {key: string, name: string}) => social.key === key)?.name ?? '';
}

const removesocial = (key: string) => {
    form.social = form.social.filter((social: any) => social.key !== key);
}
</script>

<template>
    <Head title="Resume Create" />

    <AppLayout>
        <div class="max-w-2xl flex-1 rounded-xl p-6">
            <form @submit.prevent="submit" class="space-y-3">
                <!-- Name -->
                <div class="grid gap-2">
                    <Label for="name">Name</Label>
                    <Input
                        id="name"
                        type="name"
                        name="name"
                        placeholder="Name"
                        v-model="form.name"
                        required
                    />
                                        <InputError :message="form.errors.name" />

                </div>

                <div class="grid gap-2">
                    <div class="mt-6">
                        <Label for="voucher" class="mb-2">Resume Profile</Label>
                        <Input type="file" @input="form.image = $event.target.files[0]" required />
                    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="name">Title</Label>
                    <Input
                        id="name"
                        type="name"
                        name="name"
                        placeholder="Title"
                        v-model="form.title"
                        required
                    />
                                        <InputError :message="form.errors.title" />

                </div>
                
                <div class="grid gap-2">
                    <Label for="name">Summary</Label>
                    <Textarea
                        id="summary"
                        name="name"
                        placeholder="Summary"
                        v-model="form.summary"
                        required
                    />
                    <InputError :message="form.errors.summary" />

                </div>

                <div class="grid gap-2">
                    <Label for="name">Experience Years</Label>
                    <Input
                        id="name"
                        type="number"
                        name="name"
                        placeholder="Experience Year"
                        v-model="form.experience_years"
                        required
                    />
                    <InputError :message="form.errors.experience_years" />

                </div>

                <div class="grid gap-2">
                    <Label for="name">Expected Salary</Label>
                    <Input
                        id="name"
                        type="number"
                        name="name"
                        placeholder="Expected Salary"
                        v-model="form.expected_salary"
                        required
                    />
                    <InputError :message="form.errors.expected_salary" />

                </div>


                <div class="flex-1">
                    <Label for="role" class="mb-3">Job Level</Label>

                    <Select name="role" v-model="form.job_level"> 
                        <SelectTrigger class="w-full">
                            <SelectValue placeholder="Select job level" />
                        </SelectTrigger>
                        <SelectContent>     
                            <SelectItem v-for="jobLevel in jobLevels" :key="jobLevel.value" :value="jobLevel.value">{{ jobLevel.name }}</SelectItem>
                        </SelectContent>
                    </Select>

                    <InputError :message="form.errors.job_level" />

                </div>

                <div class="flex-1">
                    <Label for="role" class="mb-3">Job Type</Label>

                    <Select name="role" v-model="form.job_type">
                        <SelectTrigger class="w-full">
                            <SelectValue placeholder="Select job type" />
                        </SelectTrigger>
                        <SelectContent>     
                            <SelectItem v-for="jobType in jobTypes" :key="jobType.value" :value="jobType.value">{{ jobType.name }}</SelectItem>
                        </SelectContent>
                    </Select>

                    <InputError :message="form.errors.job_level" />

                </div>

                <div class="grid gap-2">
                    <Label for="name">Location</Label>
                    <Input
                        id="name"
                        type="name"
                        name="name"
                        placeholder="Location"
                        v-model="form.location"
                        required
                    />
                    <InputError :message="form.errors.location" />

                </div>

                <div class="grid gap-2">
                    <Label for="skills">Skills</Label>
                    <Input id="skills" type="text" v-model="skill" @keyup.enter.stop="handleskill" placeholder="Press Enter To Add" />
                    <InputError :message="form.errors.skills" />
                </div>

                <div class="grid gap-2">
                    <div class="flex flex-col">
                        <span v-for="(skill) in form.skills" :key="skill.key" 
                            class="flex items-center gap-5 border rounded-md mb-2 text-sm p-2 w-fit"
                        >
                            {{ skill.name }}
                            

                            <div class="flex items-center gap-2">
                                <Pencil class="h-4 w-4 cursor-pointer" @click="editskill(skill.key)" />
                                <Trash2 class="h-4 w-4 cursor-pointer" @click="removeskill(skill.key)"/>
                            </div>


                        </span>
                    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="languages">Languages</Label>
                    <Input id="languages" type="text" v-model="languages" @keyup.enter.stop="handlelanguages" placeholder="Press Enter To Add" />
                    <InputError :message="form.errors.languages" />
                </div>

                <div class="grid gap-2">
                    <div class="flex flex-col">
                        <span v-for="(languages, index) in form.languages" :key="languages.key" 
                            class="flex items-center gap-5 border rounded-md mb-2 text-sm p-2 w-fit"
                        >
                            {{ languages.name }}
                            

                            <div class="flex items-center gap-2">
                                <Pencil class="h-4 w-4 cursor-pointer" @click="editlanguages(languages.key)" />
                                <Trash2 class="h-4 w-4 cursor-pointer" @click="removelanguages(languages.key)"/>
                            </div>


                        </span>
                    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="educations">Educations</Label>
                    <Input id="educations" type="text" v-model="education" @keyup.enter.stop="handleeducation" placeholder="Press Enter To Add" />
                    <InputError :message="form.errors.education" />
                </div>

                <div class="grid gap-2">
                    <div class="flex flex-col">
                        <span v-for="(education) in form.education" :key="education.key" 
                            class="flex items-center gap-5 border rounded-md mb-2 text-sm p-2 w-fit"
                        >
                            {{ education.name }}
                            

                            <div class="flex items-center gap-2">
                                <Pencil class="h-4 w-4 cursor-pointer" @click="editeducation(education.key)" />
                                <Trash2 class="h-4 w-4 cursor-pointer" @click="removeeducation(education.key)"/>
                            </div>


                        </span>
                    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="certifications">Certifications</Label>
                    <Input id="certifications" type="text" v-model="certification" @keyup.enter.stop="handlecertification" placeholder="Press Enter To Add" />
                    <InputError :message="form.errors.certifications" />
                </div>

                <div class="grid gap-2">
                    <div class="flex flex-col">
                        <span v-for="(certification, index) in form.certifications" :key="certification.key" 
                            class="flex items-center gap-5 border rounded-md mb-2 text-sm p-2 w-fit"
                        >
                            {{ certification.name }}
                            

                            <div class="flex items-center gap-2">
                                <Pencil class="h-4 w-4 cursor-pointer" @click="editcertification(certification.key)" />
                                <Trash2 class="h-4 w-4 cursor-pointer" @click="removecertification(certification.key)"/>
                            </div>


                        </span>
                    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="socials">Socials</Label>
                    <Input id="socials" type="text" v-model="social" @keyup.enter.stop="handlesocial" placeholder="Press Enter To Add" />
                    <InputError :message="form.errors.social" />
                </div>

                <div class="grid gap-2">
                    <div class="flex flex-col">
                        <span v-for="(social) in form.social" :key="social.key" 
                            class="flex items-center gap-5 border rounded-md mb-2 text-sm p-2 w-fit"
                        >
                            {{ social.name }}
                            

                            <div class="flex items-center gap-2">
                                <Pencil class="h-4 w-4 cursor-pointer" @click="editsocial(social.key)" />
                                <Trash2 class="h-4 w-4 cursor-pointer" @click="removesocial(social.key)"/>
                            </div>


                        </span>
                    </div>
                </div>

                <div>
                    <Button type="button" @click="submit"> Submit </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
