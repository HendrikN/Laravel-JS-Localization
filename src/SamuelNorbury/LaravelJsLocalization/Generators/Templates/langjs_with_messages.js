var messages = '{ messages }';
if (typeof window !== 'undefined') {
    window.__MESSAGES__ = messages;
} else if (typeof module !== 'undefined') {
    module.exports = messages;
}
