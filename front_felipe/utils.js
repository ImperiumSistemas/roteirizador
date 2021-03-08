const Utils = {
    showLoading: () => {

        document.getElementById('loading').style.cssText += 'display: block';
    },
    
    hideLoading: () => {
        document.getElementById('loading').style.cssText += 'display: none';
    },

    componentToHex: (c) => {
        const hex = c.toString(16);
        return hex.length == 1 ? `0${hex}` : hex;
    },

    rgbToHex: (r, g, b) => {
        return `#${Utils.componentToHex(r)}${Utils.componentToHex(g)}${Utils.componentToHex(b)}`;
    },
}