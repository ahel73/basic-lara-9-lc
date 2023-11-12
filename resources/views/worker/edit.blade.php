<div>
    <hr>

    <div>
        <form
            action="{{ route('workers.update', $worker->id) }}"
            method="Post"
        >
            @csrf
            @method('Patch')
            <div style="margin-bottom: 15px;">
                <input type="text" name="name"
                       placeholder="name" value="{{ $worker->name }}">
               {{-- @error('name')
                <div>
                    {{ $message }}
                </div>
                @enderror--}}
            </div>
            <div style="margin-bottom: 15px;"><input type="text" name="surname"
                                                     placeholder="surname"
                                                     value="{{ $worker->surname }}"
                >

                {{--@error('surname')
                <div>
                    {{ $message }}
                </div>
                @enderror--}}

            </div>
            <div style="margin-bottom: 15px;">
                <input type="email" name="email" placeholder="email" value="{{ $worker->email }}">

               {{-- @error('email')
                <div>
                    {{ $message }}
                </div>
                @enderror--}}
            </div>
            <div style="margin-bottom: 15px;"><input type="number" name="age"
                                                     placeholder="age"
                                                     value="{{ $worker->age }}"
                >
               {{-- @error('age')
                <div>
                    {{ $message }}
                </div>
                @enderror--}}
            </div>
            <div style="margin-bottom: 15px;"><textarea name="discription" placeholder="description">
                    {{ $worker->discription }}
                </textarea>

                {{--@error('description')
                <div>
                    {{ $message }}
                </div>
                @enderror--}}
            </div>
            <div style="margin-bottom: 15px;">
                <input
                    {{ $worker->is_married ? ' checked' : ''}}
                    id="isMarried" type="checkbox" name="is_married">
                <label for="isMarried">Is married</label>

                {{--@error('is_married')
                <div>
                    {{ $message }}
                </div>
                @enderror--}}
            </div>
            <div style="margin-bottom: 15px;"><input type="submit" value="Сохранить"></div>
        </form>
    </div>
</div>
