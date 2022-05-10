"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Devices_NetworkDevices_Create_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=script&setup=true&lang=js":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=script&setup=true&lang=js ***!
  \*****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    errors: Object,
    families: Object,
    models: Object,
    statuses: Object,
    marks: Object
  },
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var form = (0,_inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__.useForm)({
      inventory_number: '',
      comment: '',
      model: '',
      family: '',
      status: '',
      mark: '',
      manageable: '',
      ethernet_ports_number: '',
      speed: '',
      fiber_ports_number: '',
      poe: ''
    });

    var submit = function submit() {
      form.post('/network-devices/create');
    };

    var __returned__ = {
      form: form,
      submit: submit,
      useForm: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__.useForm
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=template&id=037876b1":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=template&id=037876b1 ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  "class": "text-3xl text-center"
}, "Create a New Network Device", -1
/* HOISTED */
);

var _hoisted_2 = {
  "class": "mb-6"
};

var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Inventory Number ", -1
/* HOISTED */
);

var _hoisted_4 = ["textContent"];
var _hoisted_5 = {
  "class": "mb-6"
};

var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Comment(Optional) ", -1
/* HOISTED */
);

var _hoisted_7 = ["textContent"];
var _hoisted_8 = {
  "class": "mb-6"
};

var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Model ", -1
/* HOISTED */
);

var _hoisted_10 = {
  "class": "mb-3 xl:w-96"
};
var _hoisted_11 = ["textContent"];
var _hoisted_12 = {
  "class": "mb-6"
};

var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Family ", -1
/* HOISTED */
);

var _hoisted_14 = {
  "class": "mb-3 xl:w-96"
};
var _hoisted_15 = ["textContent"];
var _hoisted_16 = {
  "class": "mb-6"
};

var _hoisted_17 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Status ", -1
/* HOISTED */
);

var _hoisted_18 = {
  "class": "mb-3 xl:w-96"
};
var _hoisted_19 = ["textContent"];
var _hoisted_20 = {
  "class": "mb-6"
};

var _hoisted_21 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Mark ", -1
/* HOISTED */
);

var _hoisted_22 = {
  "class": "mb-3 xl:w-96"
};
var _hoisted_23 = ["value"];
var _hoisted_24 = ["textContent"];
var _hoisted_25 = {
  "class": "mb-6"
};

var _hoisted_26 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Ethernet Ports Number ", -1
/* HOISTED */
);

var _hoisted_27 = ["textContent"];
var _hoisted_28 = {
  "class": "mb-6"
};

var _hoisted_29 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Fiber Ports Number ", -1
/* HOISTED */
);

var _hoisted_30 = ["textContent"];
var _hoisted_31 = {
  "class": "mb-6"
};

var _hoisted_32 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Manageable ", -1
/* HOISTED */
);

var _hoisted_33 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "Yes"
}, "Yes", -1
/* HOISTED */
);

var _hoisted_34 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_35 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "No"
}, "No", -1
/* HOISTED */
);

var _hoisted_36 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_37 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "Controller"
}, "Controller", -1
/* HOISTED */
);

var _hoisted_38 = ["textContent"];
var _hoisted_39 = {
  "class": "mb-6"
};

var _hoisted_40 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " Speed ", -1
/* HOISTED */
);

var _hoisted_41 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "Yes"
}, "100MB", -1
/* HOISTED */
);

var _hoisted_42 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_43 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "1GB"
}, "1GB", -1
/* HOISTED */
);

var _hoisted_44 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_45 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "2.5GB"
}, "2.5GB", -1
/* HOISTED */
);

var _hoisted_46 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_47 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "5GB"
}, "5GB", -1
/* HOISTED */
);

var _hoisted_48 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_49 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "10GB"
}, "10GB", -1
/* HOISTED */
);

var _hoisted_50 = ["textContent"];
var _hoisted_51 = {
  "class": "mb-6"
};

var _hoisted_52 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "class": "block mb-2 uppercase font-bold text-xs text-gray-700",
  "for": "name"
}, " POE ", -1
/* HOISTED */
);

var _hoisted_53 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "No"
}, "No", -1
/* HOISTED */
);

var _hoisted_54 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_55 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "24"
}, "24", -1
/* HOISTED */
);

var _hoisted_56 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_57 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "48"
}, "48", -1
/* HOISTED */
);

var _hoisted_58 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_59 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  "for": "24&48"
}, "24&48", -1
/* HOISTED */
);

var _hoisted_60 = ["textContent"];
var _hoisted_61 = {
  "class": "mb-6"
};
var _hoisted_62 = ["disabled"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_Head = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Head");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Head, {
    title: "Create Network Device"
  }), _hoisted_1, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", {
    onSubmit: _cache[20] || (_cache[20] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $setup.submit && $setup.submit.apply($setup, arguments);
    }, ["prevent"])),
    action: "/",
    "class": "max-w-md mx-auto mt-8"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [_hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.form.inventory_number = $event;
    }),
    "class": "border border-gray-400 p-2 w-full",
    type: "text",
    name: "inventory_number",
    id: "inventory_number",
    autofocus: ""
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.inventory_number]]), $setup.form.errors.inventory_number ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.inventory_number),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_4)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [_hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[1] || (_cache[1] = function ($event) {
      return $setup.form.comment = $event;
    }),
    "class": "border border-gray-400 p-2 w-full",
    type: "text",
    name: "comment",
    id: "comment",
    autofocus: ""
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.comment]]), $setup.form.errors.comment ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.comment),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_7)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [_hoisted_9, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "onUpdate:modelValue": _cache[2] || (_cache[2] = function ($event) {
      return $setup.form.model = $event;
    }),
    "class": "form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none",
    "aria-label": "Default select example"
  }, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($props.models, function (model) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("option", {
      key: model.id
    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(model.name), 1
    /* TEXT */
    );
  }), 128
  /* KEYED_FRAGMENT */
  ))], 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.model]])]), $setup.form.errors.model ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.model),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_11)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [_hoisted_13, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_14, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "onUpdate:modelValue": _cache[3] || (_cache[3] = function ($event) {
      return $setup.form.family = $event;
    }),
    "class": "form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none",
    "aria-label": "Default select example"
  }, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($props.families, function (family) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("option", {
      key: family.id
    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(family.name), 1
    /* TEXT */
    );
  }), 128
  /* KEYED_FRAGMENT */
  ))], 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.family]])]), $setup.form.errors.family ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.family),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_15)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_16, [_hoisted_17, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "onUpdate:modelValue": _cache[4] || (_cache[4] = function ($event) {
      return $setup.form.status = $event;
    }),
    "class": "form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none",
    "aria-label": "Default select example"
  }, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($props.statuses, function (status) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("option", {
      key: status.id
    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(status.name), 1
    /* TEXT */
    );
  }), 128
  /* KEYED_FRAGMENT */
  ))], 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.status]])]), $setup.form.errors.status ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.status),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_19)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_20, [_hoisted_21, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_22, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    "onUpdate:modelValue": _cache[5] || (_cache[5] = function ($event) {
      return $setup.form.mark = $event;
    }),
    "class": "form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none",
    "aria-label": "Default select example"
  }, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($props.marks, function (mark) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("option", {
      key: mark.id,
      value: mark.id
    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(mark.name), 9
    /* TEXT, PROPS */
    , _hoisted_23);
  }), 128
  /* KEYED_FRAGMENT */
  ))], 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.form.mark]])]), $setup.form.errors.mark ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.mark),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_24)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [_hoisted_26, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[6] || (_cache[6] = function ($event) {
      return $setup.form.ethernet_ports_number = $event;
    }),
    "class": "border border-gray-400 p-2 w-full",
    type: "number",
    name: "ethernet ports",
    id: "ethernet ports",
    autofocus: ""
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.ethernet_ports_number]]), $setup.form.errors.ethernet_ports_number ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.ethernet_ports_number),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_27)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_28, [_hoisted_29, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    "onUpdate:modelValue": _cache[7] || (_cache[7] = function ($event) {
      return $setup.form.fiber_ports_number = $event;
    }),
    "class": "border border-gray-400 p-2 w-full",
    type: "number",
    name: "fiber ports",
    id: "fiber ports",
    autofocus: ""
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.form.fiber_ports_number]]), $setup.form.errors.fiber_ports_number ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.ethernet_ports_number),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_30)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_31, [_hoisted_32, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[8] || (_cache[8] = function ($event) {
      return $setup.form.manageable = $event;
    }),
    value: "YES",
    id: "Yes"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.manageable]]), _hoisted_33, _hoisted_34, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[9] || (_cache[9] = function ($event) {
      return $setup.form.manageable = $event;
    }),
    value: "NO",
    id: "No"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.manageable]]), _hoisted_35, _hoisted_36, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[10] || (_cache[10] = function ($event) {
      return $setup.form.manageable = $event;
    }),
    value: "Controller",
    id: "Controller"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.manageable]]), _hoisted_37, $setup.form.errors.manageable ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.manageable),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_38)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_39, [_hoisted_40, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[11] || (_cache[11] = function ($event) {
      return $setup.form.speed = $event;
    }),
    value: "100MB",
    id: "100MB"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.speed]]), _hoisted_41, _hoisted_42, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[12] || (_cache[12] = function ($event) {
      return $setup.form.speed = $event;
    }),
    value: "1GB",
    id: "1GB"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.speed]]), _hoisted_43, _hoisted_44, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[13] || (_cache[13] = function ($event) {
      return $setup.form.speed = $event;
    }),
    value: "2.5GB",
    id: "2.5GB"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.speed]]), _hoisted_45, _hoisted_46, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[14] || (_cache[14] = function ($event) {
      return $setup.form.speed = $event;
    }),
    value: "5GB",
    id: "5GB"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.speed]]), _hoisted_47, _hoisted_48, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[15] || (_cache[15] = function ($event) {
      return $setup.form.speed = $event;
    }),
    value: "10GB",
    id: "10GB"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.speed]]), _hoisted_49, $setup.form.errors.speed ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.speed),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_50)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_51, [_hoisted_52, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[16] || (_cache[16] = function ($event) {
      return $setup.form.poe = $event;
    }),
    value: "NO",
    id: "No"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.poe]]), _hoisted_53, _hoisted_54, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[17] || (_cache[17] = function ($event) {
      return $setup.form.poe = $event;
    }),
    value: "24",
    id: "24"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.poe]]), _hoisted_55, _hoisted_56, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[18] || (_cache[18] = function ($event) {
      return $setup.form.poe = $event;
    }),
    value: "48",
    id: "48"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.poe]]), _hoisted_57, _hoisted_58, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "radio",
    "onUpdate:modelValue": _cache[19] || (_cache[19] = function ($event) {
      return $setup.form.poe = $event;
    }),
    value: "24&48",
    id: "24&48"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelRadio, $setup.form.poe]]), _hoisted_59, $setup.form.errors.poe ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    key: 0,
    textContent: (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.form.errors.poe),
    "class": "text-red-500 text-xs italic mt-2"
  }, null, 8
  /* PROPS */
  , _hoisted_60)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_61, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    type: "submit",
    "class": "bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500",
    disabled: $setup.form.processing
  }, "Create", 8
  /* PROPS */
  , _hoisted_62)])], 32
  /* HYDRATE_EVENTS */
  )]);
}

/***/ }),

/***/ "./resources/js/Pages/Devices/NetworkDevices/Create.vue":
/*!**************************************************************!*\
  !*** ./resources/js/Pages/Devices/NetworkDevices/Create.vue ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Create_vue_vue_type_template_id_037876b1__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=template&id=037876b1 */ "./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=template&id=037876b1");
/* harmony import */ var _Create_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Create.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var _home_vagrant_proyectos_zaiko_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_home_vagrant_proyectos_zaiko_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Create_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Create_vue_vue_type_template_id_037876b1__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Devices/NetworkDevices/Create.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=script&setup=true&lang=js":
/*!*************************************************************************************************!*\
  !*** ./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=script&setup=true&lang=js ***!
  \*************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Create.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=template&id=037876b1":
/*!********************************************************************************************!*\
  !*** ./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=template&id=037876b1 ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_template_id_037876b1__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_template_id_037876b1__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Create.vue?vue&type=template&id=037876b1 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Devices/NetworkDevices/Create.vue?vue&type=template&id=037876b1");


/***/ })

}]);