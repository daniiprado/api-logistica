export class Errors {

    constructor() {
        this.errors = {}
    }

    first(field) {
        if ( this.errors[ field ] ) {
            return this.errors[field][0]
        }
    }

    get(field) {
        if ( this.errors[ field ] ) {
            return this.errors[field]
        }
        return null;
    }

    record(errors) {
        this.errors = errors;
    }

    has( field ) {
        return this.errors.hasOwnProperty( field )
    }

    any() {
        return Object.keys( this.errors ).length > 0
    }

    clear(field) {
        if (field) {
            delete this.errors[field];
            return;
        }
        this.errors = {}
    }

    isApiError() {
        return this.has( 'hint' ) || ( this.has('error') && this.get('error') === 'invalid_credentials' );
    }
}
