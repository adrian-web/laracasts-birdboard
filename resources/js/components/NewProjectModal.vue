<template>
  <modal name="new-project" height="auto">
    <form @submit.prevent="submit">
      <div class="p-10 bg-card">
        <h1 class="mb-16 text-center text-2xl">Let's start something new</h1>

        <div class="flex">
          <div class="flex-1 mr-4">
            <div class="mb-4">
              <label for="title" class="text-sm block mb-2">Title</label>
              <input
                type="text"
                id="title"
                class="border p-2 text-xs block w-full"
                :class="form.errors.title ? 'border-red-400' : 'border-gray-200'"
                v-model="form.title"
              />
              <span
                class="text-xs italic text-red-400"
                v-if="form.errors.title"
                v-text="form.errors.title[0]"
              ></span>
            </div>
            <div class="mb-4">
              <label for="description" class="text-sm block mb-2">Description</label>
              <textarea
                id="description"
                class="border p-2 text-xs block w-full rounded"
                :class="form.errors.description ? 'border-red-400' : 'border-gray-200'"
                rows="7"
                v-model="form.description"
              ></textarea>
              <span
                class="text-xs italic text-red-400"
                v-if="form.errors.description"
                v-text="form.errors.description[0]"
              ></span>
            </div>
          </div>

          <div class="flex-1 ml-4">
            <div class="mb-4">
              <label class="text-sm block mb-2">Tasks?</label>
              <input
                type="text"
                class="border border-gray-200 mb-2 p-2 text-xs block w-full"
                v-for="(task, index) in form.tasks"
                v-model="task.body"
                :key="index"
              />
            </div>

            <button type="button" class="inline-flex items-center" @click="addTask">
              <svg class="mr-2" viewBox="0 0 18 18" height="18" width="18">
                <g fill="#000" fill-rule="evenodd" opacity=".307">
                  <path
                    fill="#000"
                    d="M14.613,10c0,0.23-0.188,0.419-0.419,0.419H10.42v3.774c0,0.23-0.189,0.42-0.42,0.42s-0.419-0.189-0.419-0.42v-3.774H5.806c-0.23,0-0.419-0.189-0.419-0.419s0.189-0.419,0.419-0.419h3.775V5.806c0-0.23,0.189-0.419,0.419-0.419s0.42,0.189,0.42,0.419v3.775h3.774C14.425,9.581,14.613,9.77,14.613,10 M17.969,10c0,4.401-3.567,7.969-7.969,7.969c-4.402,0-7.969-3.567-7.969-7.969c0-4.402,3.567-7.969,7.969-7.969C14.401,2.031,17.969,5.598,17.969,10 M17.13,10c0-3.932-3.198-7.13-7.13-7.13S2.87,6.068,2.87,10c0,3.933,3.198,7.13,7.13,7.13S17.13,13.933,17.13,10"
                  />
                </g>
              </svg>
              <span class="text-xs">Add new task</span>
            </button>
          </div>
        </div>

        <div class="flex justify-end">
          <button
            type="button"
            class="button-cancel mr-2"
            @click="$modal.hide('new-project')"
          >Cancel</button>
          <button type="submit" class="button">Create</button>
        </div>
      </div>
    </form>
  </modal>
</template>

<script>
import BirdboardForm from "./BirdboardForm";

export default {
  data() {
    return {
      form: new BirdboardForm({
        title: "",
        description: "",
        tasks: [{ body: "" }]
      })
    };
  },
  methods: {
    addTask() {
      this.form.tasks.push({ body: "" });
    },

    async submit() {
      if (!this.form.tasks[0].body) {
        delete this.form.originalData.tasks;
      }
      this.form
        .submit("/projects")
        .then(response => (location = response.data.message));
    }
  }
};
</script>