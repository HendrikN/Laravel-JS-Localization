var messages = '{ messages }';
if (typeof window !== 'undefined') {
    window.__MESSAGES__ = messages;
} else if (typeof GLOBAL !== 'undefined') {
    GLOBAL.__MESSAGES__ = messages;
}
