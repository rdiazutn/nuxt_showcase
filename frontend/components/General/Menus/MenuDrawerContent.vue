<template>
  <v-list-item
    v-if="!item.children"
    :to="item.to"
    router
    exact
  >
    <v-list-item-action v-if="item.icon" :class="['v-menu-icon', 'pl-'+space, 'mr-1']">
      <v-icon color="grey darken-2" class="mr-4">
        {{ item.icon }}
      </v-icon>
    </v-list-item-action>
    <v-list-item-content>
      <v-list-item-title class="body-1" v-text="$t(item.title)" />
    </v-list-item-content>
  </v-list-item>
  <v-list-group
    v-else
    :class="['pl-'+space]"
    no-action
    class="v-menu-icon small-padding"
  >
    <template #activator>
      <v-icon class="mr-4" color="grey darken-2">
        {{ item.icon }}
      </v-icon>
      <v-list-item-title>
        {{ $t(item.title) }}
      </v-list-item-title>
    </template>
    <template v-for="(subItem,i) in item.children">
      <MenuDrawerContent :key="`${i}-${item.to}`" class="pl-14" :space="space + 1" :item="subItem" />
    </template>
  </v-list-group>
</template>

<script>
import MenuDrawerContent from '~/components/General/Menus/MenuDrawerContent'
export default {
  name: 'MenuDrawerContent',
  components: {
    MenuDrawerContent
  },
  props: {
    item: {
      type: Object,
      default: () => {}
    },
    space: {
      type: Number,
      default: 0
    }
  }
}
</script>
