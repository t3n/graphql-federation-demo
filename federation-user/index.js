const { ApolloServer, gql } = require('apollo-server');
const { buildFederatedSchema } = require('@apollo/federation');

const typeDefs = gql`
  extend type User @key(fields: "identifier") {
    identifier: ID! @external
    avatarUrl: String
  }
`;

const resolvers = {
  User: {
    avatarUrl(user) {
      const found = users.find(u => u.identifier === user.identifier);
      return found ? found.avatarUrl : null;
    }
  }
};

const server = new ApolloServer({
  schema: buildFederatedSchema([
    {
      typeDefs,
      resolvers
    }
  ])
});

server.listen({ port: 4002 }).then(({ url }) => {
  console.log(`🚀 Server ready at ${url}`);
});

const users = [
  {
    identifier: '1',
    avatarUrl: 'https://avatarfiles.alphacoders.com/143/14397.gif'
  },
  {
    identifier: '2',
    avatarUrl: 'https://avatarfiles.alphacoders.com/143/14397.gif'
  },
  {
    identifier: '3',
    avatarUrl: 'https://avatarfiles.alphacoders.com/143/14397.gif'
  },
  {
    identifier: '4',
    avatarUrlauthorID: 'https://avatarfiles.alphacoders.com/143/14397.gif'
  }
];
