@props(['disabled' => false, 'options', 'selected' => null])

<style>
    * {
        font-family: sans-serif;
        box-sizing: border-box;
        outline: none;
    }

    [hidden] {
        display: none !important;
    }

    .msa-wrapper {
        width: 100%;
    }
    .msa-wrapper:focus-within .input-presentation {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .msa-wrapper > * {
        display: block;
        width: 100%;
    }
    .msa-wrapper .input-presentation {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        align-items: center;
        min-height: 40px;
        padding: 6px 40px 6px 12px;
        border: 1px solid rgba(0, 0, 0, 0.3);
        font-size: 1rem;
        border-radius: 10px;
        position: relative;
        cursor: pointer;
    }
    .msa-wrapper .input-presentation .placeholder {
        font-weight: 400;
        color: rgba(0, 0, 0, 0.6);
    }
    .msa-wrapper .input-presentation:after {
        content: "";
        border-top: 6px solid black;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        right: 14px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }
    .msa-wrapper .input-presentation.active {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .msa-wrapper .input-presentation .tag-badge {
        background-color: rgb(67, 62, 68);
        padding-left: 14px;
        padding-right: 28px;
        color: white;
        border-radius: 14px;
        position: relative;
    }
    .msa-wrapper .input-presentation .tag-badge span {
        font-size: 16px;
        line-height: 27px;
    }
    .msa-wrapper .input-presentation .tag-badge button {
        display: inline-block;
        padding: 0;
        -webkit-appearance: none;
        appearance: none;
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        position: absolute;
        right: 0px;
        padding-right: 10px;
        padding-left: 5px;
        cursor: pointer;
        line-height: 26px;
        height: 26px;
        font-weight: 600;
    }
    .msa-wrapper .input-presentation .tag-badge button:hover {
        background-color: rgba(255, 255, 255, 0.2);
        color: white;
    }
    .msa-wrapper ul {
        border: 1px solid rgba(0, 0, 0, 0.3);
        font-size: 1rem;
        margin: 0;
        padding: 0;
        border-top: none;
        list-style: none;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .msa-wrapper ul li {
        padding: 6px 12px;
        text-transform: capitalize;
        cursor: pointer;
    }
    .msa-wrapper ul li:hover {
        background: rgb(67, 62, 68);
        color: white;
    }
</style>

<select id="select" class="hidden">
    @foreach ($options as $key => $value)
        <option value="{{$key}}" {{$selected == $key ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
</select>

<div class="msa-wrapper" x-data="multiselectComponent()" x-init="$watch('selected', value => selectedString = value.join(',')), loadOptions()">
    <input {!! $attributes !!}
           x-model="selectedString"
           type="text" id="msa-input"
           aria-hidden="true"
           x-bind:aria-expanded="listActive.toString()"
           aria-haspopup="tag-list"
           hidden>
    <div class="input-presentation" @click="listActive = !listActive" @click.away="listActive = false" x-bind:class="{'active': listActive}">
      <span class="placeholder" x-show="selected.length == 0">Select Tags</span>
      <template x-for="(tag, index) in selected">
        <div class="tag-badge">
          <span x-text="tag"></span>
          <button x-bind:data-index="index" @click.stop="removeMe($event)">x</button>
        </div>
      </template>
    </div>
    <ul id="tag-list" x-show.transition="listActive" role="listbox">
      <template x-for="(tag, index, collection) in unselected">
        <li x-show="!selected.includes(tag)"
            x-bind:value="tag"
            x-text="tag"
            aria-role="button"
            @click.stop="addMe($event)"
            x-bind:data-index="index"
            role="option"
         ></li>
      </template>
    </ul>
</div>

<script type="text/javascript">
    function multiselectComponent() {
        return {
            listActive: false,
            selectedString: '',
            selected: [],
            unselected: [],
            addMe(e) {
                const index = e.target.dataset.index;
                const extracted = this.unselected.splice(index, 1);
                this.selected.push(extracted[0]);
            },
            removeMe(e) {
                const index = e.target.dataset.index;
                const extracted = this.selected.splice(index, 1);
                this.unselected.push(extracted[0]);
            },
            loadOptions() {
                const options = document.getElementById('select').options;
                for (let i = 0; i < options.length; i++) {
                    // this.unselected.push({
                    //     value: options[i].value,
                    //     text: options[i].innerText,
                    //     selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                    // });
                    this.unselected.push(options[i].innerText);
                }
            },
        };
    }
</script>
