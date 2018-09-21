import moment from 'moment-timezone';

export const MixinMoment = {
    created() {
        moment().tz('America/Bogota').locale('es');
    },
    methods: {
        nowYear: function () {
            return moment().year();
        },
        duration: function ( seconds ) {
            return moment().duration( seconds, 'seconds' ).format('D')
        }
    }
};
