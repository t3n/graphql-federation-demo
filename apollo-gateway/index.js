const { ApolloServer } = require('apollo-server');
const { ApolloGateway, RemoteGraphQLDataSource } = require('@apollo/gateway');

const gateway = new ApolloGateway({
  serviceList: [
    { name: 'user', url: 'http://127.0.0.1:8081/user' },
    { name: 'news', url: 'http://127.0.0.1:8081/news' }
    // { name: 'accounts', url: 'https://pw678w138q.sse.codesandbox.io/graphql' },
    // { name: 'contentapi-public', url: 'https://0yo165yq9v.sse.codesandbox.io/graphql' },
    // { name: 'products', url: 'https://x7jn4y20pp.sse.codesandbox.io/graphql' }
  ],
  buildService({ name, url }) {
    return new RemoteGraphQLDataSource({
      url
    });
  }
});

(async () => {
  const { schema, executor } = await gateway.load();

  const server = new ApolloServer({
    schema,
    executor,
    playground: true
  });

  server.listen().then(({ url }) => {
    console.log(`🚀 Server ready at ${url}`);
  });
})();
