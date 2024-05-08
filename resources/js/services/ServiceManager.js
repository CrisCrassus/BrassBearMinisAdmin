import axios from 'axios';

const ServiceManager = axios.create({
    baseURL: 'http://brassbearminisadmin.cris/api/',
    withCredentials: false,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});

export default {
    //Ranges
    addRange(data) {
        return ServiceManager.post(route('ranges.store'), data);
    },
    updateRange(data) {
        return ServiceManager.post(route('ranges.update', data.slug), data);
    },

    //Products
    deleteProduct(slug) {
        return ServiceManager.delete('/admin/products/delete/' + slug);
    },

    //Unit Types
    addUnitType(data) {
        return ServiceManager.post(route('unit-types.store'), data);
    },
    updateUnitType(data) {
        return ServiceManager.post(route('unit-types.update', data.slug), data);
    }

}
