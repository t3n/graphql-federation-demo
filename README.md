# GraphQL Federation demo

This repository is a demo how to integrate a graphql endpoint based on [t3n/graphql](https://github.com/t3n/graphql) and [t3n/graphql-apollofederation](https://github.com/t3n/graphql-federation).

To read more about Apollo federation check out [their documentation](https://www.apollographql.com/docs/apollo-server/federation/introduction/)

This package includes:

- Apollo Gateway
- A flow distribution that has two graphql endpoints `/user` and `/news`
- A nodejs graphql endpoint

Once everything is up and running you will see a single graphql endpoint that is merged together
from all three endpoints.

To get started you need to run :

```bash
# Set up flow endpoints run composer update and bring up the flow server:
cd federation-flow
composer update
./flow server:run

# finaly start the apollo gateway
cd apollo-gateway
npm i
npm run start
```

Now you have a running graphql playground at `localhost:4000`.
A query like

```graphql
query {
  allNews {
    identifier
    title
    author {
      identifier
      name
      avatarUrl
    }
  }
}
```

will fetch values from all three services in a single query.
