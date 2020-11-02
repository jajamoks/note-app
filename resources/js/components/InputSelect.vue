<template>
  <div class="relative pb-4">
    <label class="text-blue-500 pt-2 uppercase text-xs font-bold absolute">{{ label }}</label>
    <select :id="id" ref="input" v-model="selected" v-bind="$attrs" class="form-select pt-8 w-full text-gray-900 border-b pb-2 focus:outline-none focus:border-blue-400" :class="{ error: error }">
      <slot />
    </select>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `select-input-${this._uid}`
      },
    },
    value: [String, Number, Boolean],
    label: String,
    error: String,
  },
  data() {
    return {
      selected: this.value,
    }
  },
  watch: {
    selected(selected) {
      this.$emit('input', selected)
    },
  },
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
  },
}
</script>
