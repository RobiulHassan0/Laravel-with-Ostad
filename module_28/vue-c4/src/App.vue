<script setup>
import { reactive, watch } from "vue";

const formData = reactive({
  name: "",
  email: "",
  password: "",
});

const errors = reactive({
  name: "",
  email: "",
  password: "",
});

//  validate email
watch(
  () => formData.name,
  (value) => {
    if (value.length === 0) {
      errors.name = "";
    } else if (value.length < 3) {
      errors.name = "Name must be at least 3 characters.";
    } else {
      errors.name = "";
    }
  },
);

watch(
  () => formData.email,
  (value) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (value.length === 0) {
      errors.email = "";
    } else if (!emailRegex.test(value)) {
      errors.email = "Invalid email format";
    } else {
      errors.email = "";
    }
  },
);

watch(
  () => formData.password,
  (value) => {
    const passwordRegex =
      /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/;
    if (value.length < 4) {
      errors.password = "Password must be at least 4 characters.";
    } else if (!passwordRegex.test(value)) {
      errors.password =
        "Password must including uppercase, lowercase, numbers and special characters without space.";
    } else {
      errors.password = "";
    }
  },
);
</script>

<template>
  <div
    style="
      display: flex;
      flex-direction: column;
      gap: 20px;
      width: 500px;
      margin: auto;
      padding-top: 100px;
    "
  >
    <div>
      <lable style="margin-right: 10px">Name</lable>
      <input v-model="formData.name" type="text" required />
      <p v-if="errors.name" style="color: red">{{ errors.name }}</p>
    </div>

    <div>
      <lable style="margin-right: 10px">Email</lable>
      <input v-model="formData.email" type="text" required />
      <p v-if="errors.email" style="color: red">{{ errors.email }}</p>
    </div>

    <div>
      <lable style="margin-right: 10px">Password</lable>
      <input v-model="formData.password" type="password" required />
      <p v-if="errors.password" style="color: red">{{ errors.password }}</p>
    </div>

    <button>Submit</button>
  </div>
</template>

<style scoped></style>
