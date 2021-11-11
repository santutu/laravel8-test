import _ from 'lodash';
import LaravelEcho from 'laravel-echo';


declare global {
    const _: typeof _;
    const Echo: LaravelEcho;
}

