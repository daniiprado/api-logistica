import {Errors} from "./Errors";
import swal from 'sweetalert';

export class Form {

    constructor(data) {
        this.originalData = data;
        // this.data = data;

        for (let field in data) {
            this[field] = data[field];
        }
        this.errors = new Errors()
    }

    reset() {
        for (let field in this.originalData) {
            if ( typeof this[field] === 'boolean') {
                this[field] = false;
            } else {
                this[field] = null;
            }
        }
        this.errors.clear();
    }

    data() {
        let data = {};
        for (let property in this.originalData){
            data[property] = this[property]
        }
        return data;
    }

    submit(method, url) {
        return new Promise((resolve, reject) => {
            method = method.toLowerCase();
            axios[method]( url, this.data() )
                .then( (response) => {
                    this.onSuccess( response.data );
                    resolve( response.data );
                } )
                .catch( (error)  => {
                    this.onFail( error.response.data );
                    reject( error.response.data );
                })
        })
    }

    post(url) {
        return this.submit('POST', url);
    }

    get(url) {
        return this.submit('GET', url);
    }

    put(url) {
        return this.submit('PUT', url);
    }

    delete(url) {
        return this.submit('DELETE', url)
    }

    patch(url) {
        return this.submit('PATCH', url);
    }

    onSuccess(response) {
        this.reset();
        swal({
            title: lang.get('pages.messages.success'),
            text: response.message,
            icon: 'success'
        });
    }

    onFail(errors) {
        this.errors.record( errors )
    }
}
